<?php

/**
* @Quote.php
*   A description of this class goes here
*/

require_once("includes/SuperDate.php");
require_once("includes/DBExporter.php");

/**
* Definition of the Quote class
*/
class Quote extends DBExporter {

  // members
  protected $quoteId;
  protected $quote;
  protected $name;

  /**
  * Construct the Quote object
  *
  * @param $quoteId
  *   The primary key for this object
  */
  public function __construct($quoteId=false, $loadAll=false) {
    global $mysqlread;
    if ($loadAll) {
      //code here to build up arrays of related objects
    }

    if($quoteId) {
      $this->loadFromDB($quoteId);
    }
  }

  /**
  * Return the value of QuoteId
  *
  * @return
  *   an integer value
  */
  public function getQuoteId() {
    return intval($this->quoteId);
  }

  /**
  * Set the value of QuoteId
  *
  * @param $quoteId
  *   an integer value
  */      
  public function setQuoteId($quoteId) {
    if($quoteId!=$this->quoteId) {
      $this->markDirty();          
      $this->quoteId = intval($quoteId);
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
  * Loads an object's values from a given array
  *
  * @param $p
  *   An array of values keyed to match the SQL fieldnames for members of this object
  *
  * @return
  *   n/a
  */
  public function loadFromArray($p) {  
    $this->setQuoteId($p['quote_id']);
    $this->setQuote($p['quote']);
    $this->setName($p['name']);
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

    $query = "SELECT * FROM quotes WHERE quote_id = '".mysql_escape_string($id)."'";
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

    $query = "REPLACE INTO quotes
                  SET quote_id = '".mysql_escape_string($this->getQuoteId())."',
                      quote = '".mysql_escape_string($this->getQuote())."',
                      name = '".mysql_escape_string($this->getName())."'";
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

    $query = "DELETE FROM quotes WHERE quote_id = '".mysql_escape_string($this->getQuoteId())."'";
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

    $query = "INSERT INTO quotes
                SET quote = '".mysql_escape_string($this->getQuote())."',
                    name = '".mysql_escape_string($this->getName())."'";
    $this->setQuoteId($mysqlwrite->doQuery($query));
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

    $query = "SELECT count(*) as cnt FROM quotes WHERE quote_id = '".mysql_escape_string($id)."'";

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
    $query = "SELECT * FROM quotes $orderby";

    $rows = $mysqlread->getManyRows($query);

    if ($rows) {
      foreach ($rows as $row) {
        $o = new Quote();
        $o->loadFromArray($row);
        $output[] = $o;
      }
      return $output;
    } else {
      return array();
    }
  }

  /**
  * Return a random quote
  *
  */
  static public function getRandom() {
    
    global $mysqlread;
    
    $query = "SELECT * FROM quotes ORDER BY RAND() LIMIT 1";

    $row = $mysqlread->getSingleRow($query);

    if ($row) {
      $o = new Quote();
      $o->loadFromArray($row);
      return $o;
    } else {
      return false;
    }

  }

}

?>