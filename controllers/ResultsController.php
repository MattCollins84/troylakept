<?
  
  /*
   *  ResultsController
   */
  
  require_once("includes/Rest.php");
  require_once("controllers/Controller.php");

  
  Class ResultsController extends Controller {

    const MAX_SIZE = 3000;

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

      $upload = true;
      $file = $_FILES['image'];
      $msg = array();
      // extension
      $ext = ResultsController::getExtension($file['name']);
      if (!in_array($ext, array("jpg", "jpeg", "png"))) {
        $upload = false;
        $msg[] = "File type is not supported";
      }

      // size
      $filesize = filesize($file['tmp_name']);
      if ($filesize > (ResultsController::MAX_SIZE * 1024)) {
        $upload = false;
        $msg[] = "File size is over 4Mb";
      }

      if ($upload) {

        list($width,$height)=getimagesize($file['tmp_name']);

        // png
        if ($ext == "png") {
          $src = imagecreatefrompng($file['tmp_name']);
        }

        else if (in_array($ext, array("jpg", "jpeg"))) {
          $src = imagecreatefromjpeg($file['tmp_name']);
        }

        else {
          $src = imagecreatefromgif($file['tmp_name']);
        }

        // new dimensions
        $newwidth=325;
        $newheight=($height/$width)*$newwidth;
        $tmp=imagecreatetruecolor($newwidth,$newheight);

        // resize
        imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

        // filename
        $new_filename = "uploads/".rand(0, 1000)."_".rand(0, 1000).".".$ext;

        // create!
        imagejpeg($tmp,$new_filename,100);

        // clean up
        imagedestroy($src);
        imagedestroy($tmp);

      }

      $r = new Result();
      $r->setName($vars['name']);
      $r->setGoals($vars['goals']);
      $r->setStory($vars['story']);
      $r->setImg($new_filename);

      $r->markNew();
      $r->save();

      if ($r->getResultId()) {
        $_SESSION['msg'] = "Result added successfully.";
      }

      else {
        $_SESSION['msg'] = "There was a problem adding this result.";
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

  }

?>