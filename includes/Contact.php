<?php

/**
* @Contact.php
*   A description of this class goes here
*/

require_once("includes/SuperDate.php");
require_once("includes/DBExporter.php");

/**
* Definition of the Contact class
*/
class Contact extends DBExporter {

  // members
  protected $contactId;
  protected $name;
  protected $email;

  /**
  * Construct the Contact object
  *
  * @param $contactId
  *   The primary key for this object
  */
  public function __construct($contactId=false, $loadAll=false) {
    global $mysqlread;
    if ($loadAll) {
      //code here to build up arrays of related objects
    }

    if($contactId) {
      $this->loadFromDB($contactId);
    }
  }

  /**
  * Return the value of ContactId
  *
  * @return
  *   an integer value
  */
  public function getContactId() {
    return intval($this->contactId);
  }

  /**
  * Set the value of ContactId
  *
  * @param $contactId
  *   an integer value
  */      
  public function setContactId($contactId) {
    if($contactId!=$this->contactId) {
      $this->markDirty();          
      $this->contactId = intval($contactId);
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
  * Return the value of Email
  *
  * @return
  *   a string value
  */
  public function getEmail() {
    return $this->email;
  }

  /**
  * Set the value of Email
  *
  * @param $email
  *   a string value
  */    
  public function setEmail($email) {
    if($email!=$this->email) {
      $this->markDirty();          
      $this->email = $email;
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
    $this->setContactId($p['contact_id']);
    $this->setName($p['name']);
    $this->setEmail($p['email']);
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

    $query = "SELECT * FROM contacts WHERE contact_id = '".mysql_escape_string($id)."'";
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

    $query = "REPLACE INTO contacts
                  SET contact_id = '".mysql_escape_string($this->getContactId())."',
                      name = '".mysql_escape_string($this->getName())."',
                      email = '".mysql_escape_string($this->getEmail())."'";
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

    $query = "DELETE FROM contacts WHERE contact_id = '".mysql_escape_string($this->getContactId())."'";
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

    $query = "INSERT INTO contacts
                SET name = '".mysql_escape_string($this->getName())."',
                    email = '".mysql_escape_string($this->getEmail())."'";
    $this->setContactId($mysqlwrite->doQuery($query));
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

    $query = "SELECT count(*) as cnt FROM contacts WHERE contact_id = '".mysql_escape_string($id)."'";

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
    $query = "SELECT * FROM contacts $orderby";

    $rows = $mysqlread->getManyRows($query);

    if ($rows) {
      foreach ($rows as $row) {
        $o = new Contact();
        $o->loadFromArray($row);
        $output[] = $o;
      }
      return $output;
    } else {
      return false;
    }
  }

}

?>