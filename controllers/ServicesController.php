<?php
  
  /*
   *  ServicesController
   */
  
  require_once("includes/Rest.php");
  require_once("controllers/Controller.php");

  
  Class ServicesController extends Controller {

    // Render the dashboard
    static public function renderServices($rest) {
      
      global $config;

      $data = array();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $data['services'] = Service::getAll("service_id ASC");
      $data['images'] = Image::getAll("name ASC");
      $data['msg'] = $_SESSION['msg'];
      $_SESSION['msg'] = "";

      echo View::renderView("admin_services", $data, false, true);
          
    }

    // Render the dashboard
    static public function renderEditService($rest) {
      
      global $config;

      $data = array();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $data['id'] = $h[2];
      $data['images'] = Image::getAll("name ASC");

      $data['service'] = new Service($data['id']);

      echo View::renderView("admin_edit_service", $data, false, true);
          
    }

    // Render the dashboard
    static public function addService($rest) {
      
      global $config;

      $data = array();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $errors = Validation::required(array("name", "headline", "description"), $vars);

      if ($errors) {
        echo json_encode(array(
          "success" => false,
          "missing"  => $errors,
          "msg" => "Please complete all the fields"
        ));
        exit;
      }

      $q = new Service($vars['service_id']);
      $q->setName($vars['name']);
      $q->setHeadline($vars['headline']);
      $q->setDescription($vars['description']);
      $q->setIcon($vars['icon']);
      if (!$vars['service_id']) {
        $q->markNew();
      }
      $q->save();

      generateSitemap();

      $_SESSION['msg'] = "Service ".($vars['service_id']?"edited":"added")." successfully.";

      echo json_encode(array(
        "success" => true
      ));
      exit;
          
    }

    // Render the dashboard
    static public function deleteService($rest) {
      
      global $config;

      $data = array();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $data['id'] = $h[3];

      $q = new Service($data['id']);
      $q->markForDeletion();
      $q->save();

      $_SESSION['msg'] = "Service deleted successfully.";

      echo json_encode(array(
        "success" => true
      ));
      exit;
          
    }

  }

?>