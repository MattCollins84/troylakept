<?
  
  /*
   *  ImagesController
   */
  
  require_once("includes/Rest.php");
  require_once("controllers/Controller.php");

  
  Class ImagesController extends Controller {

    const MAX_SIZE = 3000;
    const MAX_HEIGHT_THUMB = 128;
    const MAX_WIDTH_THUMB = 128;

    // Render the dashboard
    static public function renderImages($rest) {
      
      global $config;

      $data = array();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $data['images'] = Image::getAll("image_id asc");
      $data['msg'] = $_SESSION['msg'];
      $_SESSION['msg'] = "";

      echo View::renderView("admin_images", $data, false, true);
          
    }

    // Render the dashboard
    static public function deleteImage($rest) {
      
      global $config;

      $data = array();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $data['id'] = $h[3];

      $q = new Image($data['id']);
      $q->markForDeletion();
      $q->save();

      $_SESSION['msg'] = "Image deleted successfully.";

      echo json_encode(array(
        "success" => true
      ));
      exit;
          
    }

    // Render the dashboard
    static public function uploadImage($rest) {
      
      global $config;

      $data = array();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      if (!$vars['height']) {
        $vars['height'] = 400;
      }

      if (!$vars['width']) {
        $vars['width'] = 900;
      }

      $file = $_FILES['image'];
      $upload = ($file['tmp_name']?true:false);
      $msg = array();
      // extension
      $ext = ImagesController::getExtension($file['name']);
      if ($upload && !in_array($ext, array("jpg", "jpeg", "png"))) {
        $upload = false;
        $msg[] = "File type is not supported";
      }

      // size
      $filesize = filesize($file['tmp_name']);
      if ($upload && $filesize > (ImagesController::MAX_SIZE * 1024)) {
        $upload = false;
        $msg[] = "File size is over 4Mb";
      }

      if ($upload) {

        $path = rand(0, 10000)."_".rand(0, 10000).".".$ext;

        $filename_thumb = Image::createImage($file, ImagesController::MAX_WIDTH_THUMB, ImagesController::MAX_HEIGHT_THUMB, "thumb_".$path);

        $filename = Image::createImage($file, $vars['width'], $vars['height'], $path);

        list($width,$height)=getimagesize("uploads/".$filename);

        $r = new Image();
        $r->setName($vars['name']);
        $r->setWidth($width);
        $r->setHeight($height);
        $r->setPath($filename);

        $r->markNew();
        $r->save();

        if ($r->getImageId()) {
          $_SESSION['msg'] = "Image added successfully.";
        }

        else {
          $_SESSION['msg'] = "There was a problem adding this image.";
        }

      }

      else {

        $_SESSION['msg'] = "There was a problem adding this image.";

      }

      if ($msg) {
        $_SESSION['msg'] .= "<br />Image could not be uploaded:".implode("<br />", $msg);
      }      

      header("Location: /admin/images");
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