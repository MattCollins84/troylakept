<?php

/**
* @Media.php
*   A description of this class goes here
*/

require_once("includes/SuperDate.php");
require_once("includes/DBExporter.php");

/**
* Definition of the Media class
*/
class Media extends DBExporter {

  // members
  protected $mediaId;
  protected $title;
  protected $intro;
  protected $url;

  /**
  * Construct the Media object
  *
  * @param $mediaId
  *   The primary key for this object
  */
  public function __construct($mediaId=false, $loadAll=false) {
    global $mysqlread;
    if ($loadAll) {
      //code here to build up arrays of related objects
    }

    if($mediaId) {
      $this->loadFromDB($mediaId);
    }
  }

  /**
  * Return the value of MediaId
  *
  * @return
  *   an integer value
  */
  public function getMediaId() {
    return intval($this->mediaId);
  }

  /**
  * Set the value of MediaId
  *
  * @param $mediaId
  *   an integer value
  */      
  public function setMediaId($mediaId) {
    if($mediaId!=$this->mediaId) {
      $this->markDirty();          
      $this->mediaId = intval($mediaId);
    }
  }

  /**
  * Return the value of Title
  *
  * @return
  *   a string value
  */
  public function getTitle() {
    return $this->title;
  }

  /**
  * Set the value of Title
  *
  * @param $title
  *   a string value
  */    
  public function setTitle($title) {
    if($title!=$this->title) {
      $this->markDirty();          
      $this->title = $title;
    }
  }

  /**
  * Return the value of Intro
  *
  * @return
  *   a string value
  */
  public function getIntro() {
    return $this->intro;
  }

  /**
  * Set the value of Intro
  *
  * @param $intro
  *   a string value
  */    
  public function setIntro($intro) {
    if($intro!=$this->intro) {
      $this->markDirty();          
      $this->intro = $intro;
    }
  }

  /**
  * Return the value of Url
  *
  * @return
  *   a string value
  */
  public function getUrl() {
    return $this->url;
  }

  /**
  * Set the value of Url
  *
  * @param $url
  *   a string value
  */    
  public function setUrl($url) {
    if($url!=$this->url) {
      $this->markDirty();          
      $this->url = $url;
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
    $this->setMediaId($p['media_id']);
    $this->setTitle($p['title']);
    $this->setIntro($p['intro']);
    $this->setUrl($p['url']);
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

    $query = "SELECT * FROM media WHERE media_id = '".mysql_escape_string($id)."'";
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

    $query = "REPLACE INTO media
                  SET media_id = '".mysql_escape_string($this->getMediaId())."',
                      title = '".mysql_escape_string($this->getTitle())."',
                      intro = '".mysql_escape_string($this->getIntro())."',
                      url = '".mysql_escape_string($this->getUrl())."'";
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

    $query = "DELETE FROM media WHERE media_id = '".mysql_escape_string($this->getMediaId())."'";
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

    $query = "INSERT INTO media
                SET title = '".mysql_escape_string($this->getTitle())."',
                    intro = '".mysql_escape_string($this->getIntro())."',
                    url = '".mysql_escape_string($this->getUrl())."'";
    $this->setMediaId($mysqlwrite->doQuery($query));
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

    $query = "SELECT count(*) as cnt FROM media WHERE media_id = '".mysql_escape_string($id)."'";

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
    $query = "SELECT * FROM media $orderby";

    $rows = $mysqlread->getManyRows($query);

    if ($rows) {
      foreach ($rows as $row) {
        $o = new Media();
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