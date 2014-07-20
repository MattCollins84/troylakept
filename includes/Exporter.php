<?php

  /**
   * @Exporter.php
   *  
   * A class that can be exported as a XML, Text, JSON or PHP-seralized format.
   */
  
  /**
   * Represents an Exporter class 
   *
   * Definition of the Exporter class 
   */
  class Exporter {
    
    // enumeration of $xmlFormat indicating whether the XML format is many elements or a single element with several attributes
    const MANY_ELEMENTS = "many_elements";
    const SINGLE_ELEMENT = "single_element";
    
    // a list of member variables that are never included in XML serializations of this object
    const IGNORE_ATTRIBUTES = "dirtyStatus,xmlFormat,badTimestamps";
    
    // the format of the XML
    protected $xmlFormat = Exporter::MANY_ELEMENTS;
   
    /**
     * Return the top bit of an XML file
     *
     * @return
     *   a string containing a standard XML declaration
     */
    public function getXMLDeclaration() {
      return "<"."?"."xml version=\"1.0\""."?".">\n";
    }
    
    /**
     * Set xmlFormat for this object
     *
     * The xmlFormat determines whether the object is rendered as a series of attributes or a series of elements
     *
     * @param $xmlFormat
     *   The new xmlFormat 
     *
     * @return
     *   n/a
     */
    public function setXmlFormat($xmlFormat) {
      assert($xmlFormat == Exporter::MANY_ELEMENTS || $xmlFormat == Exporter::SINGLE_ELEMENT);
      $this->xmlFormat=$xmlFormat;
    }
  
    /**
     * Get xmlFormat for this object
     *
     * @return
     *   the current xmlFormat
     */
    public function getXmlFormat() {
      return $this->xmlFormat;
    }
    
    
    /**
     * Exports the supplied object as a bunch of objects
     *
     * @param $object
     *   the object to work on
     *
     * @return
     *   the current object as XML
     */
    public static function objectArray( $object ) {
      
      if ( is_array( $object ))
        return $object ;
      
      if ( !is_object( $object ))
        return false ;
      
      $serial = serialize( $object ) ;
      $serial = preg_replace( '/O:\d+:".+?"/' ,'a' , $serial ) ;
      if( preg_match_all( '/s:\d+:"\\0.+?\\0(.+?)"/' , $serial, $ms, PREG_SET_ORDER )) {
        foreach( $ms as $m ) {
          $serial = str_replace( $m[0], 's:'. strlen( $m[1] ) . ':"'.$m[1] . '"', $serial ) ;
        }
      }

     return @unserialize( $serial ) ;

    }

    /**
     * Gives an JSON version of the class. 
     *
     * @return
     *   the current object as JSON
     */
    public function exportAsJSON() {
    // return json_encode($this->objectArray($this));
      return json_encode($this);
    }
    
    /**
     * Gives an text version of the class. 
     *
     * @return
     *   the current object as text
     */
    public function exportAsText() {
      return print_r($this,true);
    }

    /**
     * Gives an PHP serialized version of the class. 
     *
     * @return
     *   the current object as PHP text
     */
    public function exportAsPHP() {
      return serialize($this);
    }
    
    /**
     * Calculate the difference between two Exporter objects 
     *
     * @return
     *   the text difference
     */
    static public function diff($ob1,$ob2) {
      $arr1 = $ob1->objectArray($ob1);
      $arr2 = $ob2->objectArray($ob2);

      $difference="";
      foreach($arr1 as $key=>$value) {
        if($arr2[$key] !=$value) {
          $difference .= sprintf("%s: %s -> %s\n",$key,$arr1[$key],$arr2[$key]);
        }
      }
      
      return $difference;
      
    }
    
  }


?>
