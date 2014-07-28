<?
  
  /*
   *  ResultsController
   */
  
  require_once("includes/Rest.php");
  require_once("controllers/Controller.php");

  
  Class ResultsController extends Controller {

    // Render the dashboard
    static public function renderResults($rest) {
      
      global $config;

      $data = array();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $data['msg'] = $_SESSION['msg'];
      $_SESSION['msg'] = "";

      echo View::renderView("admin_results", $data, false, true);
          
    }

  }

?>