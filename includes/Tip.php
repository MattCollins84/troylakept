<?php

/**
* @Tip.php
*   A description of this class goes here
*/

require_once("includes/SuperDate.php");
require_once("includes/DBExporter.php");

/**
* Definition of the Tip class
*/
class Tip extends DBExporter {

  // members
  protected $tipId;
  protected $tip;

  /**
  * Construct the Tip object
  *
  * @param $tipId
  *   The primary key for this object
  */
  public function __construct($tipId=false, $loadAll=false) {
    global $mysqlread;
    if ($loadAll) {
      //code here to build up arrays of related objects
    }

    if($tipId) {
      $this->loadFromDB($tipId);
    }
  }

  /**
  * Return the value of TipId
  *
  * @return
  *   an integer value
  */
  public function getTipId() {
    return intval($this->tipId);
  }

  /**
  * Set the value of TipId
  *
  * @param $tipId
  *   an integer value
  */      
  public function setTipId($tipId) {
    if($tipId!=$this->tipId) {
      $this->markDirty();          
      $this->tipId = intval($tipId);
    }
  }

  /**
  * Return the value of Tip
  *
  * @return
  *   a string value
  */
  public function getTip() {
    return $this->tip;
  }

  /**
  * Set the value of Tip
  *
  * @param $tip
  *   a string value
  */    
  public function setTip($tip) {
    if($tip!=$this->tip) {
      $this->markDirty();          
      $this->tip = $tip;
    }
  }

  /**
  * Loads an object's values from a given array
  *
  * @param $p
  *   An array of values keyed to match the SQL fieldnames for members of this object
  *
  * @return
  *   n/a
  */
  public function loadFromArray($p) {  
    $this->setTipId($p['tip_id']);
    $this->setTip($p['tip']);
    $this->markUnchanged();
  }
  
  /**
  * Loads an object from the database
  *
  * @param $id
  *   The primary key of the record to load
  *
  * @return
  *   Returns 1 on success, 0 on failure
  */
  public function loadFromDB($id) {

    global $mysqlread;

    $query = "SELECT * FROM tips WHERE tip_id = '".mysql_escape_string($id)."'";
    $p = $mysqlread->getSingleRow($query);
    if($p) {
      $this->loadFromArray($p);
      return 1;
    }
    return 0;
  }

  /**
  * Updates an existing record in the database, overwriting the values with those from this object
  *
  * @return
  *   n/a
  */
  public function updateDB() {

    global $mysqlwrite;

    $query = "REPLACE INTO tips
                  SET tip_id = '".mysql_escape_string($this->getTipId())."',
                      tip = '".mysql_escape_string($this->getTip())."'";
    $mysqlwrite->doQuery($query);
    $this->markUnchanged();
  }

  /**
  * Deletes this object from the database
  *
  * @return
  *   n/a
  */
  public function deleteDB() {

    global $mysqlwrite;

    $query = "DELETE FROM tips WHERE tip_id = '".mysql_escape_string($this->getTipId())."'";
    $mysqlwrite->doQuery($query);
  }

  /**
  * Saves this object to the database for the first time
  *
  * @return
  *   Does not return a value, but will set the primary key member of this object
  */
  public function saveDB() {

    global $mysqlwrite;

    $query = "INSERT INTO tips
                SET tip = '".mysql_escape_string($this->getTip())."'";
    $this->setTipId($mysqlwrite->doQuery($query));
    $this->markUnchanged();
  }


  /**
  * Detects if this object exists in the DB
  *
  * @return
  *   TRUE or FALSE
  */
  static public function doesExist($id) {

    global $mysqlread;

    $query = "SELECT count(*) as cnt FROM tips WHERE tip_id = '".mysql_escape_string($id)."'";

    if ($mysqlread->getSingleField($query)) {
      return true;
    } else {
      return false;
    }
  }


  /**
  * Return all objects of this type from DB
  *
  * @param $sortby
  *   the field on which to sort the array of objects
  * @return
  *   Array of objects
  */
  static public function getAll($sortby=false) {
    global $mysqlread;
    $output = array();

    $orderby = "";
    if ($sortby) {
      $orderby = "ORDER BY ".$sortby;
    }
    $query = "SELECT * FROM tips $orderby";

    $rows = $mysqlread->getManyRows($query);

    if ($rows) {
      foreach ($rows as $row) {
        $o = new Tip();
        $o->loadFromArray($row);
        $output[] = $o;
      }
      return $output;
    } else {
      return array();
    }
  }

}

?>