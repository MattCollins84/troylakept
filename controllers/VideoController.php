<?php
  
  /*
   *  VideoController
   */
  
  require_once("includes/Rest.php");
  require_once("controllers/Controller.php");

  
  Class VideoController extends Controller {

    // Render the dashboard
    static public function renderVideos($rest) {
      
      global $config;

      $data = array();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $data['videos'] = Video::getAll("title ASC");
      $data['msg'] = $_SESSION['msg'];
      $_SESSION['msg'] = "";

      echo View::renderView("admin_videos", $data, false, true);
          
    }

    // Render the dashboard
    static public function deleteVideo($rest) {
      
      global $config;

      $data = array();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $data['id'] = $h[3];

      $q = new Video($data['id']);
      $q->markForDeletion();
      $q->save();

      $_SESSION['msg'] = "Video deleted successfully.";

      echo json_encode(array(
        "success" => true
      ));
      exit;
          
    }

    // Render the dashboard
    static public function featureVideo($rest) {
      
      global $config;

      $data = array();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $data['id'] = $h[3];

      Video::feature($data['id']);
          
    }

    // Render the dashboard
    static public function addVideo($rest) {
      
      global $config;

      $data = array();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $errors = Validation::required(array("url", "title"), $vars);

      if ($errors) {
        echo json_encode(array(
          "success" => false,
          "missing"  => $errors
        ));
        exit;
      }

      $q = new Video();
      $q->setUrl($vars['url']);
      $q->setTitle($vars['title']);
      $q->setDescription($vars['desc']);
      $q->setThumbnail($vars['thumbnail']);
      $q->markNew();
      $q->save();

      $_SESSION['msg'] = "Video added successfully.";

      echo json_encode(array(
        "success" => true
      ));
      exit;
          
    }

  }

?>