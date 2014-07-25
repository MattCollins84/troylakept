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

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $data = array();
      $data['page'] = "services";
      $data['services'] = Service::getAll("service_id ASC");
      $data['quote'] = Quote::getRandom();

      echo View::renderView("services", $data);
          
    }

    // Render the results
    static public function renderBlog($rest) {
      
      global $config;

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $year = $h[1];
      $month = $h[2];

      $data = array();
      $data['page'] = "blog";
      $data['posts'] = Blog::getAll($year, $month, 10);
      $data['history'] = Blog::getMonths();
      $data['months'] = array("1" => "January","2" => "February","3" => "March","4" => "April","5" => "May","6" => "June","7" => "July","8" => "August","9" => "September","10" => "October","11" => "November","12" => "December");
      $data['quote'] = Quote::getRandom();

      echo View::renderView("blog", $data);
          
    }

    // Render the results
    static public function renderBlogPost($rest) {
      
      global $config;

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $year = $h[1];
      $month = $h[2];

      $data = array();
      $data['page'] = "blog";
      $data['post'] = new Blog($h[2]);
      $data['history'] = Blog::getMonths();
      $data['months'] = array("1" => "January","2" => "February","3" => "March","4" => "April","5" => "May","6" => "June","7" => "July","8" => "August","9" => "September","10" => "October","11" => "November","12" => "December");
      $data['quote'] = Quote::getRandom();

      echo View::renderView("blog_article", $data);
          
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