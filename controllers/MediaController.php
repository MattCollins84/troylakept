<?php
  
  /*
   *  MediaController
   */
  
  require_once("includes/Rest.php");
  require_once("controllers/Controller.php");

  
  Class MediaController extends Controller {

    // Render the dashboard
    static public function renderMedia($rest) {
      
      global $config;

      $data = array();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $data['media'] = Media::getAll("title asc");
      $data['msg'] = $_SESSION['msg'];
      $_SESSION['msg'] = "";

      echo View::renderView("admin_media", $data, false, true);
          
    }

    // Render the dashboard
    static public function deleteMedia($rest) {
      
      global $config;

      $data = array();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $data['id'] = $h[3];

      $q = new Media($data['id']);
      $q->markForDeletion();
      $q->save();

      $_SESSION['msg'] = "Media link deleted successfully.";

      echo json_encode(array(
        "success" => true
      ));
      exit;
          
    }

    // Render the dashboard
    static public function addMedia($rest) {
      
      global $config;

      $data = array();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $errors = Validation::required(array("title", "intro", "url"), $vars);

      if ($errors) {
        echo json_encode(array(
          "success" => false,
          "missing"  => $errors,
          "msg" => "Please complete all fields"
        ));
        exit;
      }

      $q = new Media();
      $q->setUrl($vars['url']);
      $q->setTitle($vars['title']);
      $q->setIntro($vars['intro']);
      $q->markNew();
      $q->save();

      $_SESSION['msg'] = "Media link added successfully.";

      echo json_encode(array(
        "success" => true
      ));
      exit;
          
    }

  }

?>