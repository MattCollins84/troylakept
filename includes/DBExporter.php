<?php

  /**
   * @DBExporter.php
   *  A class that can be serialized as XML, text, JSON and PHP formats. 
   *  This object also maintains a “dirtyStatus” to record whether the the 
   *  object needs writing to the database or not. Other classes are derived 
   *  from Exporter and are expected to override loadFromDB(), updateDB() and 
   *  saveDB(). The “setters” of derived classes should set the dirtyStatus to “dirty”.
   *
   */

  require_once("includes/Exporter.php");

  /**
   * Represents a DBExporter class 
   *
   * Definition of the DBExporter class which extends the Exporter class
   */
  abstract class DBExporter extends Exporter {

    // enumeration of $dirtyStatus indicating whether this object needs saving or not
    const DIRTY_STATUS_UNCHANGED = "UNCHANGED";
    const DIRTY_STATUS_DIRTY = "DIRTY";
    const DIRTY_STATUS_DELETED = "DELETED";
    const DIRTY_STATUS_NEW = "NEW";
        
    // whether this object
    protected $dirtyStatus = DBExporter::DIRTY_STATUS_UNCHANGED;
    
    /**
     * Set the dirtyStatus attribute
     *
     * Passing in a new value for dirtyStatus
     *
     * @param $dirtyStatus
     *   The new status 
     *
     * @return
     *   n/a
     */
    public function setDirtyStatus($dirtyStatus) {
      assert($dirtyStatus == DBExporter::DIRTY_STATUS_UNCHANGED ||
             $dirtyStatus == DBExporter::DIRTY_STATUS_DIRTY ||
             $dirtyStatus == DBExporter::DIRTY_STATUS_DELETED ||
             $dirtyStatus == DBExporter::DIRTY_STATUS_NEW);
      $this->dirtyStatus = $dirtyStatus;
    }
    
    /**
     * Get the dirtyStatus attribute
     *
     * @return
     *   the current value of dirtyStatus
     */
    public function getDirtyStatus() {
      return $this->dirtyStatus;
    }
    
    /**
     * Mark the current object as dirty
     *
     * @return
     *   n/a
     */
    public function markDirty() {
      $this->setDirtyStatus(DBExporter::DIRTY_STATUS_DIRTY);
    }

    /**
     * Mark the current object as new
     *
     * @return
     *   n/a
     */
    public function markNew() {
      $this->setDirtyStatus(DBExporter::DIRTY_STATUS_NEW);
    }

    /**
     * Mark the current object as unchanged
     *
     * @return
     *   n/a
     */
    public function markUnchanged() {
      $this->setDirtyStatus(DBExporter::DIRTY_STATUS_UNCHANGED);
    }
    
    /**
     * Mark the current object for deletion
     *
     * @return
     *   n/a
     */
    public function markForDeletion() {
      $this->dirtyStatus = DBExporter::DIRTY_STATUS_DELETED;
    }
  
    /**
     * Allow all values to be set by passing in an associative array
     *
     * @param $p
     *   An associative array containing all the new values for this class 
     *
     * @return
     *   n/a
     */
    abstract public function loadFromArray($p);
      
    /**
     * Loads an object from the database given an id
     *
     * @param $id
     *   The unique id of the object
     *
     * @return
     *   n/a
     */
    abstract function loadFromDB($id);
    
    /**
     * Updates the current object object by writing to the database
     *
     * @return
     *   n/a
     */
    abstract function updateDB();
    
    /**
     * Saves this object to the database for the first time
     *
     * @return
     *   n/a
     */
    abstract function saveDB();
    
    /**
     * Deletes this object from the database
     *
     * @return
     *   n/a
     */
    abstract function deleteDB();

    /**
     * Save the current object (and any other DBExporter objects contained within) to the database
     *
     * @return
     *   n/a
     */
    public function save() {
      
      // save this object, if necessary
      switch($this->dirtyStatus) {
        case DBExporter::DIRTY_STATUS_NEW:    $this->saveDB();break;
        case DBExporter::DIRTY_STATUS_DIRTY:  $this->updateDB(); break;
        case DBExporter::DIRTY_STATUS_DELETED: $this->deleteDB(); break;
        case DBExporter::DIRTY_STATUS_UNCHANGED: break; // do nothing;
        default: break; // do nothing
      }
      
      // save child objects if necessary
      $classVars = get_object_vars($this);
      $xml = "";
      
      // iterate through each attribute
      foreach ($classVars as $key=>$val) {
        
        // if this is an array
        if(is_array($val)) {
          
          // iterate through each member of the array
          foreach($val as $newkey=>$newval) {
            
            // if the memember is itself an DBExporter object
            if(is_object($newval) && is_subclass_of($newval,'DBExporter')) {
              
              // call its save function
              $newval->save();
            }
          }
        } else {
          // if the memember is itself an DBExporter object
          if(is_object($val)  && is_subclass_of($val,'DBExporter')) {
            
            // call its save function
            $val->save();
          }          
        }
      }
      
    }
  }


?>
