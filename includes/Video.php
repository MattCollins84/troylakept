<?php

/**
* @Video.php
*   A description of this class goes here
*/

require_once("includes/SuperDate.php");
require_once("includes/DBExporter.php");

/**
* Definition of the Video class
*/
class Video extends DBExporter {

  // members
  protected $videoId;
  protected $url;
  protected $title;
  protected $description;
  protected $thumbnail;
  protected $featured;

  /**
  * Construct the Video object
  *
  * @param $videoId
  *   The primary key for this object
  */
  public function __construct($videoId=false, $loadAll=false) {
    global $mysqlread;
    if ($loadAll) {
      //code here to build up arrays of related objects
    }

    if($videoId) {
      $this->loadFromDB($videoId);
    }
  }

  /**
  * Return the value of VideoId
  *
  * @return
  *   an integer value
  */
  public function getVideoId() {
    return intval($this->videoId);
  }

  /**
  * Set the value of VideoId
  *
  * @param $videoId
  *   an integer value
  */      
  public function setVideoId($videoId) {
    if($videoId!=$this->videoId) {
      $this->markDirty();          
      $this->videoId = intval($videoId);
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
  * Return the value of Description
  *
  * @return
  *   a string value
  */
  public function getDescription() {
    return $this->description;
  }

  /**
  * Set the value of Description
  *
  * @param $description
  *   a string value
  */    
  public function setDescription($description) {
    if($description!=$this->description) {
      $this->markDirty();          
      $this->description = $description;
    }
  }

  /**
  * Return the value of Thumbnail
  *
  * @return
  *   a string value
  */
  public function getThumbnail() {
    return $this->thumbnail;
  }

  /**
  * Set the value of Thumbnail
  *
  * @param $thumbnail
  *   a string value
  */    
  public function setThumbnail($thumbnail) {
    if($thumbnail!=$this->thumbnail) {
      $this->markDirty();          
      $this->thumbnail = $thumbnail;
    }
  }

  /**
  * Return the value of tinyint Featured
  *
  * @return
  *   a BOOL value
  */
  public function getFeatured() {
    if ($this->featured) {
      return true;
    } else {
      return false;
    }
  }

  /**
  * Set the value of Featured
  *
  * @param $featured
  *   a BOOL value
  */      
  public function setFeatured($featured) {
    if($featured!=$this->featured) {
      $this->markDirty();  
      
      if ($featured) {
        $this->featured = true;
      } else {
        $this->featured = false;
      }
      
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
    $this->setVideoId($p['video_id']);
    $this->setUrl($p['url']);
    $this->setTitle($p['title']);
    $this->setDescription($p['description']);
    $this->setThumbnail($p['thumbnail']);
    $this->setFeatured($p['featured']);
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

    $query = "SELECT * FROM videos WHERE video_id = '".mysql_escape_string($id)."'";
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

    $query = "REPLACE INTO videos
                  SET video_id = '".mysql_escape_string($this->getVideoId())."',
                      url = '".mysql_escape_string($this->getUrl())."',
                      title = '".mysql_escape_string($this->getTitle())."',
                      description = '".mysql_escape_string($this->getDescription())."',
                      thumbnail = '".mysql_escape_string($this->getThumbnail())."',
                      featured = '".mysql_escape_string($this->getFeatured())."'";
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

    $query = "DELETE FROM videos WHERE video_id = '".mysql_escape_string($this->getVideoId())."'";
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

    $query = "INSERT INTO videos
                SET url = '".mysql_escape_string($this->getUrl())."',
                    title = '".mysql_escape_string($this->getTitle())."',
                    description = '".mysql_escape_string($this->getDescription())."',
                    thumbnail = '".mysql_escape_string($this->getThumbnail())."',
                    featured = '".mysql_escape_string($this->getFeatured())."'";
    $this->setVideoId($mysqlwrite->doQuery($query));
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

    $query = "SELECT count(*) as cnt FROM videos WHERE video_id = '".mysql_escape_string($id)."'";

    if ($mysqlread->getSingleField($query)) {
      return true;
    } else {
      return false;
    }
  }

  /**
  * Mark this video featured
  *
  * @return
  *   TRUE or FALSE
  */
  static public function feature($id) {

    global $mysqlwrite;

    $query = "UPDATE videos SET featured = 0";
    $mysqlwrite->doQuery($query);

    $query = "UPDATE videos SET featured = 1 WHERE video_id = '".mysql_escape_string($id)."'";
    $mysqlwrite->doQuery($query);

    return true;

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
    $query = "SELECT * FROM videos $orderby";

    $rows = $mysqlread->getManyRows($query);

    if ($rows) {
      foreach ($rows as $row) {
        $o = new Video();
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