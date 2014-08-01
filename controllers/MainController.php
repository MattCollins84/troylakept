<?
  
  /*
   *  MainController
   */
  
  require_once("includes/Rest.php");
  require_once("includes/Email.php");
  require_once("controllers/Controller.php");

  
  Class MainController extends Controller {


    // Render the homepage
    static public function renderHomepage($rest) {
      
      global $config;

      $data = array();
      $data['page'] = "homepage";
      $data['quote'] = Quote::getRandom();
      $data['videos'] = Video::getAll(false, true);
      $data['services'] = Service::getAll("service_id ASC");
      $data['about'] = new Content(1);
      $data['about'] = $data['about']->getContent();

      foreach ($data['services'] as $s) {

        switch ($s->getServiceId()) {

          case 1:
          $data['one'] = $s;
          break;

          case 3:
          $data['partner'] = $s;
          break;

          case 4:
          $data['fitfarm'] = $s;
          break;

        }

      }

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      echo View::renderView("homepage", $data);
          
    }

    // Render the results
    static public function renderResults($rest) {
      
      global $config;

      $data = array();
      $data['page'] = "results";
      $data['results'] = Result::getAll();
      $data['quote'] = Quote::getRandom();
      $data['services'] = Service::getAll("service_id ASC");

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      echo View::renderView("results", $data);
          
    }

    // Render the results
    static public function renderMedia($rest) {
      
      global $config;

      $data = array();
      $data['page'] = "media";
      $data['media'] = Media::getAll();
      $data['quote'] = Quote::getRandom();
      $data['services'] = Service::getAll("service_id ASC");

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      echo View::renderView("media", $data);
          
    }

    // Render the results
    static public function renderResultsProfile($rest) {
      
      global $config;

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $data = array();
      $data['page'] = "results";
      $data['result'] = new Result($h[2]);
      $data['quote'] = Quote::getRandom();
      $data['services'] = Service::getAll("service_id ASC");

      echo View::renderView("results_profile", $data);
          
    }

    // Render the results
    static public function renderService($rest) {
      
      global $config;

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $data = array();
      $data['page'] = "services";
      $data['service'] = new Service($h[2]);
      $data['quote'] = Quote::getRandom();
      $data['services'] = Service::getAll("service_id ASC");

      echo View::renderView("services", $data);
          
    }

    // Render the results
    static public function renderBlog($rest) {
      
      global $config, $pd;

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
      $data['services'] = Service::getAll("service_id ASC");

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
      $data['keywords'] = $data['post']->getKeywords();
      $data['services'] = Service::getAll("service_id ASC");

      echo View::renderView("blog_article", $data);
          
    }

    // Render the results
    static public function renderContact($rest) {
      
      global $config;

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $year = $h[1];
      $month = $h[2];

      $data = array();
      $data['page'] = "contact";
      $data['quote'] = Quote::getRandom();
      $data['services'] = Service::getAll("service_id ASC");

      echo View::renderView("contact", $data);
          
    }

    // Render the results
    static public function sendContact($rest) {
      
      global $config;

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $errors = Validation::required(array("name", "subject", "message", "email"), $vars);

      if ($errors || !Validation::email($vars['email'])) {
        echo json_encode(array(
          "success" => false,
          "error" => "Please complete the Name, Subject, Email and Message fields.\nPlease supply a valid email address."
        ));
        exit;
      }

      $body = "";
      $body .= "Name:\t\t\t".$vars['name']."\n";
      if ($vars['phone']) {
        $body .= "Phone:\t\t\t".$vars['phone']."\n";
      }
      if ($vars['email']) {
        $body .= "Email:\t\t\t".$vars['email']."\n";
      }
      if ($vars['where']) {
        $body .= "Heard of you from:\t\t".$vars['where']."\n";
      }
      $body .= "\n\n";

      $body .= $vars['message'];



      $send = Email::contactEmail($config['support_email'], $vars['subject'], $body, $vars['email']);

      if ($vars['signup']) {
        $c = new Contact();
        $c->setName($vars['name']);
        $c->setEmail($vars['email']);
        $c->setPhone($vars['phone']);
        $c->setActive(true);
        $c->markNew(true);
        $c->save();
      }

      echo json_encode(array(
        "success" => true
      ));
      exit;
          
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
      $c->setActive(true);
      $c->markNew(true);
      $c->save();

      echo json_encode(array(
        "success" => true
      ));
      exit;
          
    }

    // Render the results
    static public function renderThanks($rest) {
      
      global $config;

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $data = array();
      $data['services'] = Service::getAll("service_id ASC");
      $data['quote'] = Quote::getRandom();

      echo View::renderView("thanks", $data);
          
    }

    // Render the results
    static public function renderWelcome($rest) {
      
      global $config;

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $data = array();
      $data['tips'] = Tip::getAll("tip_id asc");
      $data['services'] = Service::getAll("service_id ASC");
      $data['quote'] = Quote::getRandom();

      echo View::renderView("welcome", $data);
          
    }

  }

?>