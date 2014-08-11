<?php
  
  /*
   *  ContentController
   */
  
  require_once("includes/Rest.php");
  require_once("controllers/Controller.php");

  
  Class ContentController extends Controller {

    // Render the dashboard
    static public function renderAbout($rest) {
      
      global $config;

      $data = array();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $data['about'] = new Content(1);
      $data['msg'] = $_SESSION['msg'];
      $_SESSION['msg'] = "";

      echo View::renderView("admin_about", $data, false, true);
          
    }

    // Render the dashboard
    static public function updateAbout($rest) {
      
      global $config;

      $data = array();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $data['about'] = new Content(1);

      $data['about']->setContent($vars['about']);
      $data['about']->save();

      $_SESSION['msg'] = "&quot;About&quot; section updated successfully.";

      echo json_encode(array(
        "success" => true
      ));
      exit;
          
    }

  }

?>