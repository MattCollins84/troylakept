<?

  /*
    DB.php
    Class to handle mySQL Connectivity
  */
  require_once("includes/config.php");

  Class DB {
    
    //protected
    protected $mysql;
    protected $insertId; 
    
    //constructor
    function __construct() {

      global $config;

      $this->mysql = mysql_connect($config['db']['host'], $config['db']['user'], $config['db']['password']);
      
      if (!$this->mysql) {
        die("mySQL failed to connect ".mysql_error());
      }
      
      mysql_select_db($config['db']['db']);
    }
    
    //get single row
    public function getSingleRow($query) {
      $sql = mysql_query($query, $this->mysql);
      
      //no results
      if (!$sql) {
        return false;
      }
      
      $rows = mysql_fetch_assoc($sql);
      
      return $rows;
    }
    
    //get many rows
    public function getManyRows($query) {
      $sql = mysql_query($query, $this->mysql);
      
      //no results
      if (!$sql) {
        return false;
      }
      
      $rows = array();
      while($row = mysql_fetch_assoc($sql)) {
        $rows[] = $row;
      }
      
      return $rows;
    }
    
    //get many rows
    public function getSingleField($query) {
      $sql = mysql_query($query, $this->mysql);
      
      //no results
      if (!$sql) {
        return false;
      }
      
      $row = mysql_fetch_array($sql);
       
      return $row[0];
    }
    
    //run a query
    public function doQuery($query) {
      
      $this->insertId = false;
      $sql = mysql_query($query, $this->mysql);
      
      //if no response
      if (!$sql) {
        return false;
      }
      
      $this->insertId = mysql_insert_id();
      
      if ($this->insertId) {
        return $this->insertId;
      }
      
      else return true;
    }
  }
?>
