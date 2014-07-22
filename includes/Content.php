<?php

/**
* @Content.php
*   A description of this class goes here
*/

require_once("includes/SuperDate.php");
require_once("includes/DBExporter.php");

/**
* Definition of the Content class
*/
class Content extends DBExporter {

  // members
  protected $contentId;
  protected $content;
  protected $type;

  /**
  * Construct the Content object
  *
  * @param $contentId
  *   The primary key for this object
  */
  public function __construct($contentId=false, $loadAll=false) {
    global $mysqlread;
    if ($loadAll) {
      //code here to build up arrays of related objects
    }

    if($contentId) {
      $this->loadFromDB($contentId);
    }
  }

  /**
  * Return the value of ContentId
  *
  * @return
  *   an integer value
  */
  public function getContentId() {
    return intval($this->contentId);
  }

  /**
  * Set the value of ContentId
  *
  * @param $contentId
  *   an integer value
  */      
  public function setContentId($contentId) {
    if($contentId!=$this->contentId) {
      $this->markDirty();          
      $this->contentId = intval($contentId);
    }
  }

  /**
  * Return the value of Content
  *
  * @return
  *   a string value
  */
  public function getContent() {
    return $this->content;
  }

  /**
  * Set the value of Content
  *
  * @param $content
  *   a string value
  */    
  public function setContent($content) {
    if($content!=$this->content) {
      $this->markDirty();          
      $this->content = $content;
    }
  }

  /**
  * Return the value of Type
  *
  * @return
  *   a string value
  */
  public function getType() {
    return $this->type;
  }

  /**
  * Set the value of Type
  *
  * @param $type
  *   a string value
  */    
  public function setType($type) {
    if($type!=$this->type) {
      $this->markDirty();          
      $this->type = $type;
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
    $this->setContentId($p['content_id']);
    $this->setContent($p['content']);
    $this->setType($p['type']);
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

    $query = "SELECT * FROM content WHERE content_id = '".mysql_escape_string($id)."'";
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

    $query = "REPLACE INTO content
                  SET content_id = '".mysql_escape_string($this->getContentId())."',
                      content = '".mysql_escape_string($this->getContent())."',
                      type = '".mysql_escape_string($this->getType())."'";
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

    $query = "DELETE FROM content WHERE content_id = '".mysql_escape_string($this->getContentId())."'";
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

    $query = "INSERT INTO content
                SET content = '".mysql_escape_string($this->getContent())."',
                    type = '".mysql_escape_string($this->getType())."'";
    $this->setContentId($mysqlwrite->doQuery($query));
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

    $query = "SELECT count(*) as cnt FROM content WHERE content_id = '".mysql_escape_string($id)."'";

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
    $query = "SELECT content_id FROM content $orderby";

    $rows = $mysqlread->getManyRows($query);

    if ($rows) {
      foreach ($rows as $r) {
        $o = new Content($r['content_id']);
        $output[] = $o->objectArray($o);
      }
      return $output;
    } else {
      return false;
    }
  }

}

?>