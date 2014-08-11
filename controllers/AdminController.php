<?php
  
  /*
   *  AdminController
   */
  
  require_once("includes/Rest.php");
  require_once("controllers/Controller.php");

  
  Class AdminController extends Controller {


    // Render the admin login
    static public function renderLogin($rest) {
      
      global $config;

      $data = array();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      if ($_SESSION['user'] && $_SESSION['user']['type'] == "admin") {
        header("Location: /admin/dashboard");
        exit;
      }

      echo View::renderView("login", $data, false, true);
          
    }

    // Render the dashboard
    static public function renderDashboard($rest) {
      
      global $config;

      $data = array();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      echo View::renderView("dashboard", $data, false, true);
          
    }

    // Render the dashboard
    static public function renderContacts($rest) {
      
      global $config;

      $data = array();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $data['contacts'] = Contact::getAll("name ASC");

      echo View::renderView("admin_contacts", $data, false, true);
          
    }

    // Render the dashboard
    static public function renderHelp($rest) {
      
      global $config;

      $data = array();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      echo View::renderView("admin_help", $data, false, true);
          
    }

  }

?>