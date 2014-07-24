<?php

/**
* @Blog.php
*   A description of this class goes here
*/

require_once("includes/SuperDate.php");
require_once("includes/DBExporter.php");

/**
* Definition of the Blog class
*/
class Blog extends DBExporter {

  // members
  protected $blogId;
  protected $postedDate;
  protected $title;
  protected $body;
  protected $quote;
  protected $intro;

  /**
  * Construct the Blog object
  *
  * @param $blogId
  *   The primary key for this object
  */
  public function __construct($blogId=false, $loadAll=false) {
    global $mysqlread;
    if ($loadAll) {
      //code here to build up arrays of related objects
    }

    $this->postedDate = new SuperDate();
    if($blogId) {
      $this->loadFromDB($blogId);
    }
  }

  /**
  * Return the value of BlogId
  *
  * @return
  *   an integer value
  */
  public function getBlogId() {
    return intval($this->blogId);
  }

  /**
  * Set the value of BlogId
  *
  * @param $blogId
  *   an integer value
  */      
  public function setBlogId($blogId) {
    if($blogId!=$this->blogId) {
      $this->markDirty();          
      $this->blogId = intval($blogId);
    }
  }

  /**
  * Return the value of PostedDate
  *
  * @return
  *   a SuperDate object
  */
  public function getPostedDate() {
    return $this->postedDate;
  }

  /**
  * Set the value of PostedDate
  *
  * @param $postedDate
  *   a MySQL date or SuperDate object
  */
  public function setPostedDate($postedDate) {
    if(is_object($postedDate) && get_class($postedDate)=="SuperDate") {
      if($this->postedDate->getAsSeconds() != $postedDate->getAsSeconds()) {
        $this->postedDate = $postedDate;
        $this->markDirty();          
      }
    } else {
      if(!$this->postedDate->equals($postedDate)) {
        $this->postedDate->initialiseMySQLDate($postedDate);
        $this->markDirty();          
      }
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

  public function getSEOTitle() {
    //Unwanted:  {UPPERCASE} ; / ? : @ & = + $ , . ! ~ * ' ( )
    $string = strtolower($this->title);
    //Strip any unwanted characters
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    //Clean multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", " ", $string);
    //Convert whitespaces and underscore to dash
    $string = preg_replace("/[\s_]/", "-", $string);
    return $string;
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
  * Return the value of Body
  *
  * @return
  *   a string value
  */
  public function getBody() {
    return $this->body;
  }

  /**
  * Set the value of Body
  *
  * @param $body
  *   a string value
  */    
  public function setBody($body) {
    if($body!=$this->body) {
      $this->markDirty();          
      $this->body = $body;
    }
  }

  /**
  * Return the value of Quote
  *
  * @return
  *   a string value
  */
  public function getQuote() {
    return $this->quote;
  }

  /**
  * Set the value of Quote
  *
  * @param $quote
  *   a string value
  */    
  public function setQuote($quote) {
    if($quote!=$this->quote) {
      $this->markDirty();          
      $this->quote = $quote;
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
  * Loads an object's values from a given array
  *
  * @param $p
  *   An array of values keyed to match the SQL fieldnames for members of this object
  *
  * @return
  *   n/a
  */
  public function loadFromArray($p) {  
    $this->setBlogId($p['blog_id']);
    $this->setPostedDate($p['posted_date']);
    $this->setTitle($p['title']);
    $this->setBody($p['body']);
    $this->setQuote($p['quote']);
    $this->setIntro($p['intro']);
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

    $query = "SELECT * FROM blog WHERE blog_id = '".mysql_escape_string($id)."'";
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

    $query = "REPLACE INTO blog
                  SET blog_id = '".mysql_escape_string($this->getBlogId())."',
                      posted_date = '".mysql_escape_string($this->getPostedDate()->getAsMySQLDate())."',
                      title = '".mysql_escape_string($this->getTitle())."',
                      body = '".mysql_escape_string($this->getBody())."',
                      quote = '".mysql_escape_string($this->getQuote())."',
                      intro = '".mysql_escape_string($this->getIntro())."'";
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

    $query = "DELETE FROM blog WHERE blog_id = '".mysql_escape_string($this->getBlogId())."'";
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

    $query = "INSERT INTO blog
                SET posted_date = '".mysql_escape_string($this->getPostedDate()->getAsMySQLDate())."',
                    title = '".mysql_escape_string($this->getTitle())."',
                    body = '".mysql_escape_string($this->getBody())."',
                    quote = '".mysql_escape_string($this->getQuote())."',
                    intro = '".mysql_escape_string($this->getIntro())."'";
    $this->setBlogId($mysqlwrite->doQuery($query));
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

    $query = "SELECT count(*) as cnt FROM blog WHERE blog_id = '".mysql_escape_string($id)."'";

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
  static public function getAll() {
    global $mysqlread;
    $output = array();

    $query = "SELECT * FROM blog ORDER BY posted_date DESC";

    $rows = $mysqlread->getManyRows($query);

    if ($rows) {
      foreach ($rows as $row) {
        $o = new Blog();
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