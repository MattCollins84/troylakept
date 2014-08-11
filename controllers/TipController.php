<?php
  
  /*
   *  TipController
   */
  
  require_once("includes/Rest.php");
  require_once("controllers/Controller.php");

  
  Class TipController extends Controller {

    // Render the dashboard
    static public function renderTips($rest) {
      
      global $config;

      $data = array();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $data['tips'] = Tip::getAll("tip_id asc");
      $data['msg'] = $_SESSION['msg'];
      $_SESSION['msg'] = "";

      echo View::renderView("admin_tips", $data, false, true);
          
    }

    // Render the dashboard
    static public function deleteTip($rest) {
      
      global $config;

      $data = array();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $data['id'] = $h[3];

      $q = new Tip($data['id']);
      $q->markForDeletion();
      $q->save();

      $_SESSION['msg'] = "Top Tip deleted successfully.";

      echo json_encode(array(
        "success" => true
      ));
      exit;
          
    }

    // Render the dashboard
    static public function addTip($rest) {
      
      global $config;

      $data = array();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $errors = Validation::required(array("tip"), $vars);

      if ($errors) {
        echo json_encode(array(
          "success" => false,
          "missing"  => $errors,
          "msg" => "Please complete all fields"
        ));
        exit;
      }

      $q = new Tip();
      $q->setTip($vars['tip']);
      $q->markNew();
      $q->save();

      $_SESSION['msg'] = "Top Tip added successfully.";

      echo json_encode(array(
        "success" => true
      ));
      exit;
          
    }

  }

?>