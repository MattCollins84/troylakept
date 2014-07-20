<?
  
  /*
   *  Authentication Controller
   */
  
  require_once("includes/Rest.php");
  // require_once("includes/User.php");
  require_once("controllers/Controller.php");
  
  Class AuthenticationController extends Controller {

    static public function adminOnly() {

      if ($_SESSION['user'] && $_SESSION['user']['type'] == "admin") {
        return true;
      }

      return false;

    }

    static public function adminOrClient() {

      if ($_SESSION['user']) {
        return true;
      }

      return false;

    }

    // Render the name input page
    static public function login($rest) {

      $data = array();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $errors = Validation::required(array("username", "password"), $vars);

      if ($errors) {
        echo json_encode(array(
          "success" => false,
          "missing"  => $errors
        ));
        exit;
      }

      if ($vars['username'] != "troylakept" && md5($password) != "5f4dcc3b5aa765d61d8327deb882cf99") {
        echo json_encode(array(
          "success" => false
        ));
        exit;
      }

      $_SESSION['user'] = array(

        "name" => "Troy",
        "type" => "admin"

      );

      echo json_encode(array(
        "success" => true,
        "url" => "/admin/dashboard"
      ));
      exit;
          
    }

    static public function logout($rest) {

      $_SESSION = array();

      header("Location: /admin");
      exit;

    }



  }

?>