<?
  
  /*
   *  MainController
   */
  
  require_once("includes/Rest.php");
  require_once("controllers/Controller.php");

  
  Class MainController extends Controller {


    // Render the homepage
    static public function renderHomepage($rest) {
      
      global $config;

      $data = array();
      $data['page'] = "homepage";
      $data['quote'] = Quote::getRandom();
      $data['videos'] = Video::getAll();
      $data['about'] = new Content(1);
      $data['about'] = explode("\n", $data['about']->getContent());

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      echo View::renderView("homepage", $data);
          
    }

    // Render the results
    static public function renderResults($rest) {
      
      global $config;

      $data = array();
      $data['page'] = "results";
      $data['quote'] = Quote::getRandom();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      echo View::renderView("results", $data);
          
    }

    // Render the results
    static public function renderServices($rest) {
      
      global $config;

      $data = array();
      $data['page'] = "services";
      $data['services'] = Service::getAll("service_id ASC");
      $data['quote'] = Quote::getRandom();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      echo View::renderView("services", $data);
          
    }

    // Render the results
    static public function renderBlog($rest) {
      
      global $config;

      $data = array();
      $data['page'] = "blog";
      $data['posts'] = Blog::getAll();
      $data['quote'] = Quote::getRandom();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      echo View::renderView("blog", $data);
          
    }

    // Render the results
    static public function doSignup($rest) {
      
      global $config;

      $data = array();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $errors = Validation::required(array("name", "email"), $vars);

      if ($errors) {
        echo json_encode(array(
          "success" => false,
          "error" => "Please complete the name AND email address fields"
        ));
        exit;
      }

      if (Validation::email($vars['email']) === false) {
        echo json_encode(array(
          "success" => false,
          "error" => "Please supply a valid email address"
        ));
        exit;
      }

      $c = new Contact();
      $c->setName($vars['name']);
      $c->setEmail($vars['email']);
      $c->markNew(true);
      $c->save();

      echo json_encode(array(
        "success" => true
      ));
      exit;
          
    }

  }

?>