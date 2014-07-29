<?php

/**
* @Result.php
*   A description of this class goes here
*/

require_once("includes/SuperDate.php");
require_once("includes/DBExporter.php");

/**
* Definition of the Result class
*/
class Result extends DBExporter {

  // members
  protected $resultId;
  protected $name;
  protected $intro;
  protected $goals;
  protected $story;
  protected $img;

  /**
  * Construct the Result object
  *
  * @param $resultId
  *   The primary key for this object
  */
  public function __construct($resultId=false, $loadAll=false) {
    global $mysqlread;
    if ($loadAll) {
      //code here to build up arrays of related objects
    }

    if($resultId) {
      $this->loadFromDB($resultId);
    }
  }

  /**
  * Return the value of ResultId
  *
  * @return
  *   an integer value
  */
  public function getResultId() {
    return intval($this->resultId);
  }

  /**
  * Set the value of ResultId
  *
  * @param $resultId
  *   an integer value
  */      
  public function setResultId($resultId) {
    if($resultId!=$this->resultId) {
      $this->markDirty();          
      $this->resultId = intval($resultId);
    }
  }

  /**
  * Return the value of Name
  *
  * @return
  *   a string value
  */
  public function getName() {
    return $this->name;
  }

  /**
  * Set the value of Name
  *
  * @param $name
  *   a string value
  */    
  public function setName($name) {
    if($name!=$this->name) {
      $this->markDirty();          
      $this->name = $name;
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
  * Return the value of Goals
  *
  * @return
  *   a string value
  */
  public function getGoals() {
    return $this->goals;
  }

  /**
  * Set the value of Goals
  *
  * @param $goals
  *   a string value
  */    
  public function setGoals($goals) {
    if($goals!=$this->goals) {
      $this->markDirty();          
      $this->goals = $goals;
    }
  }

  /**
  * Return the value of Story
  *
  * @return
  *   a string value
  */
  public function getStory() {
    return $this->story;
  }

  /**
  * Set the value of Story
  *
  * @param $story
  *   a string value
  */    
  public function setStory($story) {
    if($story!=$this->story) {
      $this->markDirty();          
      $this->story = $story;
    }
  }

  /**
  * Return the value of Img
  *
  * @return
  *   a string value
  */
  public function getImg() {
    return $this->img;
  }

  /**
  * Set the value of Img
  *
  * @param $img
  *   a string value
  */    
  public function setImg($img) {
    if($img!=$this->img) {
      $this->markDirty();          
      $this->img = $img;
    }
  }

  public function getSEOTitle() {
    //Unwanted:  {UPPERCASE} ; / ? : @ & = + $ , . ! ~ * ' ( )
    $string = strtolower($this->name."-".$this->goals);
    //Strip any unwanted characters
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    //Clean multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", " ", $string);
    //Convert whitespaces and underscore to dash
    $string = preg_replace("/[\s_]/", "-", $string);
    return $string;
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
    $this->setResultId($p['result_id']);
    $this->setName($p['name']);
    $this->setIntro($p['intro']);
    $this->setGoals($p['goals']);
    $this->setStory($p['story']);
    $this->setImg($p['img']);
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

    $query = "SELECT * FROM results WHERE result_id = '".mysql_escape_string($id)."'";
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

    $query = "REPLACE INTO results
                  SET result_id = '".mysql_escape_string($this->getResultId())."',
                      name = '".mysql_escape_string($this->getName())."',
                      intro = '".mysql_escape_string($this->getIntro())."',
                      goals = '".mysql_escape_string($this->getGoals())."',
                      story = '".mysql_escape_string($this->getStory())."',
                      img = '".mysql_escape_string($this->getImg())."'";
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

    $query = "DELETE FROM results WHERE result_id = '".mysql_escape_string($this->getResultId())."'";
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

    $query = "INSERT INTO results
                SET name = '".mysql_escape_string($this->getName())."',
                    intro = '".mysql_escape_string($this->getIntro())."',
                    goals = '".mysql_escape_string($this->getGoals())."',
                    story = '".mysql_escape_string($this->getStory())."',
                    img = '".mysql_escape_string($this->getImg())."'";
    $this->setResultId($mysqlwrite->doQuery($query));
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

    $query = "SELECT count(*) as cnt FROM results WHERE result_id = '".mysql_escape_string($id)."'";

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
    $query = "SELECT * FROM results $orderby";

    $rows = $mysqlread->getManyRows($query);

    if ($rows) {
      foreach ($rows as $row) {
        $o = new Result();
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