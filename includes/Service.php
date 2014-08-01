<?php

/**
* @Service.php
*   A description of this class goes here
*/

require_once("includes/SuperDate.php");
require_once("includes/DBExporter.php");

/**
* Definition of the Service class
*/
class Service extends DBExporter {

  // members
  protected $serviceId;
  protected $name;
  protected $headline;
  protected $description;
  protected $icon;

  /**
  * Construct the Service object
  *
  * @param $serviceId
  *   The primary key for this object
  */
  public function __construct($serviceId=false, $loadAll=false) {
    global $mysqlread;
    if ($loadAll) {
      //code here to build up arrays of related objects
    }

    if($serviceId) {
      $this->loadFromDB($serviceId);
    }
  }

  /**
  * Return the value of ServiceId
  *
  * @return
  *   an integer value
  */
  public function getServiceId() {
    return intval($this->serviceId);
  }

  /**
  * Set the value of ServiceId
  *
  * @param $serviceId
  *   an integer value
  */      
  public function setServiceId($serviceId) {
    if($serviceId!=$this->serviceId) {
      $this->markDirty();          
      $this->serviceId = intval($serviceId);
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

  public function getSEOName() {
    //Unwanted:  {UPPERCASE} ; / ? : @ & = + $ , . ! ~ * ' ( )
    $string = strtolower($this->name);
    //Strip any unwanted characters
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    //Clean multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", " ", $string);
    //Convert whitespaces and underscore to dash
    $string = preg_replace("/[\s_]/", "-", $string);
    return $string;
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
  * Return the value of Headline
  *
  * @return
  *   a string value
  */
  public function getHeadline() {
    return $this->headline;
  }

  /**
  * Set the value of Headline
  *
  * @param $headline
  *   a string value
  */    
  public function setHeadline($headline) {
    if($headline!=$this->headline) {
      $this->markDirty();          
      $this->headline = $headline;
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
  * Return the value of Icon
  *
  * @return
  *   a string value
  */
  public function getIcon() {
    return $this->icon;
  }

  /**
  * Set the value of Icon
  *
  * @param $icon
  *   a string value
  */    
  public function setIcon($icon) {
    if($icon!=$this->icon) {
      $this->markDirty();          
      $this->icon = $icon;
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
    $this->setServiceId($p['service_id']);
    $this->setName($p['name']);
    $this->setHeadline($p['headline']);
    $this->setDescription($p['description']);
    $this->setIcon($p['icon']);
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

    $query = "SELECT * FROM services WHERE service_id = '".mysql_escape_string($id)."'";
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

    $query = "REPLACE INTO services
                  SET service_id = '".mysql_escape_string($this->getServiceId())."',
                      name = '".mysql_escape_string($this->getName())."',
                      headline = '".mysql_escape_string($this->getHeadline())."',
                      description = '".mysql_escape_string($this->getDescription())."',
                      icon = '".mysql_escape_string($this->getIcon())."'";
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

    $query = "DELETE FROM services WHERE service_id = '".mysql_escape_string($this->getServiceId())."'";
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

    $query = "INSERT INTO services
                SET name = '".mysql_escape_string($this->getName())."',
                    headline = '".mysql_escape_string($this->getHeadline())."',
                    description = '".mysql_escape_string($this->getDescription())."',
                    icon = '".mysql_escape_string($this->getIcon())."'";
    $this->setServiceId($mysqlwrite->doQuery($query));
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

    $query = "SELECT count(*) as cnt FROM services WHERE service_id = '".mysql_escape_string($id)."'";

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
    $query = "SELECT * FROM services $orderby";

    $rows = $mysqlread->getManyRows($query);

    if ($rows) {
      foreach ($rows as $r) {
        $o = new Service();
        $o->loadFromArray($r);
        $output[] = $o;
      }
      return $output;
    } else {
      return array();
    }
  }

}

?>