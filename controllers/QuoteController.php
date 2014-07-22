<?
  
  /*
   *  QuoteController
   */
  
  require_once("includes/Rest.php");
  require_once("controllers/Controller.php");

  
  Class QuoteController extends Controller {

    // Render the dashboard
    static public function renderQuotes($rest) {
      
      global $config;

      $data = array();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $data['quotes'] = Quote::getAll("name ASC");
      $data['msg'] = $_SESSION['msg'];
      $_SESSION['msg'] = "";

      echo View::renderView("admin_quotes", $data, false, true);
          
    }

    // Render the dashboard
    static public function deleteQuote($rest) {
      
      global $config;

      $data = array();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $data['id'] = $h[3];

      $q = new Quote($data['id']);
      $q->markForDeletion();
      $q->save();

      $_SESSION['msg'] = "Quote deleted successfully.";

      echo json_encode(array(
        "success" => true
      ));
      exit;
          
    }

    // Render the dashboard
    static public function addQuote($rest) {
      
      global $config;

      $data = array();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $errors = Validation::required(array("name", "quote"), $vars);

      if ($errors) {
        echo json_encode(array(
          "success" => false,
          "missing"  => $errors
        ));
        exit;
      }

      $q = new Quote();
      $q->setName($vars['name']);
      $q->setQuote($vars['quote']);
      $q->markNew();
      $q->save();

      $_SESSION['msg'] = "Quote added successfully.";

      echo json_encode(array(
        "success" => true
      ));
      exit;
          
    }

  }

?>