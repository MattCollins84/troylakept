<?php
  
  /*
   *  ResultsController
   */
  
  require_once("includes/Rest.php");
  require_once("controllers/Controller.php");

  
  Class ResultsController extends Controller {

    const MAX_SIZE = 3000;
    const MAX_HEIGHT_THUMB = 238;
    const MAX_WIDTH_THUMB = 366;
    const MAX_HEIGHT = 480;
    const MAX_WIDTH = 640;

    // Render the dashboard
    static public function renderResults($rest) {
      
      global $config;

      $data = array();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $data['results'] = Result::getAll();

      $data['msg'] = $_SESSION['msg'];
      $_SESSION['msg'] = "";

      echo View::renderView("admin_results", $data, false, true);
          
    }

    // Render the dashboard
    static public function uploadResults($rest) {
      
      global $config;

      $data = array();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $file = $_FILES['image'];
      $upload = ($file['tmp_name']?true:false);
      $msg = array();
      // extension
      $ext = ResultsController::getExtension($file['name']);
      if ($upload && !in_array($ext, array("jpg", "jpeg", "png"))) {
        $upload = false;
        $msg[] = "File type is not supported";
      }

      // size
      $filesize = filesize($file['tmp_name']);
      if ($upload && $filesize > (ResultsController::MAX_SIZE * 1024)) {
        $upload = false;
        $msg[] = "File size is over 4Mb";
      }

      if ($upload) {

        $path = rand(0, 10000)."_".rand(0, 10000).".".$ext;

        $filename_thumb = Image::createImage($file, ResultsController::MAX_WIDTH_THUMB, ResultsController::MAX_HEIGHT_THUMB, "thumb_".$path);

        $filename = Image::createImage($file, ResultsController::MAX_WIDTH, ResultsController::MAX_HEIGHT, $path);

      }

      $r = new Result($vars['result_id']);
      $r->setName($vars['name']);
      $r->setGoals($vars['goals']);
      $r->setStory($vars['story']);
      $r->setIntro($vars['intro']);
      
      if ($upload) {
        $r->setImg($filename);
      }

      if (!$r->getResultId()) {
        $r->markNew();
      }
      $r->save();

      if ($r->getResultId()) {
        $_SESSION['msg'] = "Customer story ".($vars['result_id']?"edited":"added")." successfully.";
      }

      else {
        $_SESSION['msg'] = "There was a problem ".($vars['result_id']?"editing":"adding")." this customer story.";
      }

      if ($msg) {
        $_SESSION['msg'] .= "<br />Image could not be uploaded:".implode("<br />", $msg);
      }

      header("Location: /admin/results");
      exit;
          
    }

    static function getExtension($str) {
      $i = strrpos($str,".");
      if (!$i) { return ""; } 
      $l = strlen($str) - $i;
      $ext = substr($str,$i+1,$l);
      return $ext;
    }

    // Render the dashboard
    static public function deleteResult($rest) {
      
      global $config;

      $data = array();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $data['id'] = $h[3];

      $q = new Result($data['id']);
      $q->markForDeletion();
      $q->save();

      $_SESSION['msg'] = "Customer story deleted successfully.";

      echo json_encode(array(
        "success" => true
      ));
      exit;
          
    }

    // Render the dashboard
    static public function renderEditResult($rest) {
      
      global $config;

      $data = array();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $data['id'] = $h[2];

      $data['result'] = new Result($data['id']);

      echo View::renderView("admin_edit_result", $data, false, true);
          
    }
  }

?>