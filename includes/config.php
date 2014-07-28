<?
require_once("includes/DB.php");
require_once("includes/Contact.php");
require_once("includes/Quote.php");
require_once("includes/Video.php");
require_once("includes/Service.php");
require_once("includes/Content.php");
require_once("includes/Parsedown.php");
require_once("includes/Blog.php");
require_once("includes/Result.php");
require_once("includes/functions.php");

session_start();
date_default_timezone_set("UTC");

global $config;
global $mysqlread;
global $mysqlwrite;
global $pd;

$pd = new Parsedown();

$json = json_decode(file_get_contents('includes/config.json'), true);
$hostname = $_SERVER['HTTP_HOST'];

$config = array();
foreach ($json['config'] as $c) {

  if (in_array($hostname, $c['hostnames'])) {
    $config = $c;
  }
  
}

// mark if loaded or not
if ($config) {
  $config['is_loaded'] = true;

  $mysqlread = new DB();
  $mysqlwrite = new DB();

} else {
  $config['is_loaded'] = false;
}

?>