<?php

/**
* @Image.php
*   A description of this class goes here
*/

require_once("includes/SuperDate.php");
require_once("includes/DBExporter.php");

/**
* Definition of the Image class
*/
class Image extends DBExporter {

  // members
  protected $imageId;
  protected $path;
  protected $height;
  protected $width;

  /**
  * Construct the Image object
  *
  * @param $imageId
  *   The primary key for this object
  */
  public function __construct($imageId=false, $loadAll=false) {
    global $mysqlread;
    if ($loadAll) {
      //code here to build up arrays of related objects
    }

    if($imageId) {
      $this->loadFromDB($imageId);
    }
  }

  /**
  * Return the value of ImageId
  *
  * @return
  *   an integer value
  */
  public function getImageId() {
    return intval($this->imageId);
  }

  /**
  * Set the value of ImageId
  *
  * @param $imageId
  *   an integer value
  */      
  public function setImageId($imageId) {
    if($imageId!=$this->imageId) {
      $this->markDirty();          
      $this->imageId = intval($imageId);
    }
  }

  /**
  * Return the value of Path
  *
  * @return
  *   a string value
  */
  public function getPath() {
    return $this->path;
  }

  /**
  * Set the value of Path
  *
  * @param $path
  *   a string value
  */    
  public function setPath($path) {
    if($path!=$this->path) {
      $this->markDirty();          
      $this->path = $path;
    }
  }

  /**
  * Return the value of Height
  *
  * @return
  *   an integer value
  */
  public function getHeight() {
    return intval($this->height);
  }

  /**
  * Set the value of Height
  *
  * @param $height
  *   an integer value
  */      
  public function setHeight($height) {
    if($height!=$this->height) {
      $this->markDirty();          
      $this->height = intval($height);
    }
  }

  /**
  * Return the value of Width
  *
  * @return
  *   an integer value
  */
  public function getWidth() {
    return intval($this->width);
  }

  /**
  * Set the value of Width
  *
  * @param $width
  *   an integer value
  */      
  public function setWidth($width) {
    if($width!=$this->width) {
      $this->markDirty();          
      $this->width = intval($width);
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
    $this->setImageId($p['image_id']);
    $this->setPath($p['path']);
    $this->setHeight($p['height']);
    $this->setWidth($p['width']);
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

    $query = "SELECT * FROM images WHERE image_id = '".mysql_escape_string($id)."'";
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

    $query = "REPLACE INTO images
                  SET image_id = '".mysql_escape_string($this->getImageId())."',
                      path = '".mysql_escape_string($this->getPath())."',
                      height = '".mysql_escape_string($this->getHeight())."',
                      width = '".mysql_escape_string($this->getWidth())."'";
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

    $query = "DELETE FROM images WHERE image_id = '".mysql_escape_string($this->getImageId())."'";
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

    $query = "INSERT INTO images
                SET path = '".mysql_escape_string($this->getPath())."',
                    height = '".mysql_escape_string($this->getHeight())."',
                    width = '".mysql_escape_string($this->getWidth())."'";
    $this->setImageId($mysqlwrite->doQuery($query));
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

    $query = "SELECT count(*) as cnt FROM images WHERE image_id = '".mysql_escape_string($id)."'";

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
    $query = "SELECT * FROM images $orderby";

    $rows = $mysqlread->getManyRows($query);

    if ($rows) {
      foreach ($rows as $row) {
        $o = new Image();
        $o->loadFromArray($row);
        $output[] = $o;
      }
      return $output;
    } else {
      return false;
    }
  }

  static public function createImage($file, $max_width=1000, $max_height=1000, $path="") {

    $ext = ResultsController::getExtension($file['name']);

    list($width,$height)=getimagesize($file['tmp_name']);

    // png
    if ($ext == "png") {
      $src = imagecreatefrompng($file['tmp_name']);
    }

    else if (in_array($ext, array("jpg", "jpeg"))) {
      $src = imagecreatefromjpeg($file['tmp_name']);
    }

    else {
      $src = imagecreatefromgif($file['tmp_name']);
    }

    // is this portrait or landscape?
    $orientation = "landscape";
    if ($height > $width) {
      $orientation = "portrait";
    }

    /**********
      THUMBNAILS
    **********/

    // for portrait
    if ($orientation == "portrait") {

      // new dimensions - thumbnail
      $newheight = ($height < $max_height)?$height:$max_height;
      $newwidth=($width/$height)*$newheight;

    }

    // landscape
    else {

      // new dimensions - thumbnail
      $newwidth = ($width < $max_width)?$width:$max_width;
      $newheight=($height/$width)*$newwidth;

    }

    // check that both height and width are within the boundaries
    if ($newwidth > $max_width) {

      $pc = ($max_width/$newwidth);

      $newwidth = floor($newwidth * $pc);
      $newheight = floor($newheight * $pc);

    }

    if ($newheight > $max_height) {

      $pc = ($max_height/$newheight);

      $newwidth = floor($newwidth * $pc);
      $newheight = floor($newheight * $pc);

    }

    // create the new image - thumb
    $tmp=imagecreatetruecolor($newwidth,$newheight);

    // resize
    imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

    // create thumb!
    imagejpeg($tmp,"uploads/".$path,100);

    // clean up
    imagedestroy($src);
    imagedestroy($tmp);

    return $path;

  }

}

?>