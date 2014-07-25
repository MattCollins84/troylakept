<?
  
  /*
   *  BlogController
   */
  
  require_once("includes/Rest.php");
  require_once("controllers/Controller.php");

  
  Class BlogController extends Controller {

    // Render the dashboard
    static public function renderBlog($rest) {
      
      global $config;

      $data = array();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $data['posts'] = Blog::getAll();
      $data['msg'] = $_SESSION['msg'];
      $_SESSION['msg'] = "";

      echo View::renderView("admin_blog", $data, false, true);
          
    }

    // Render the dashboard
    static public function deleteBlog($rest) {
      
      global $config;

      $data = array();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $data['id'] = $h[3];

      $q = new Blog($data['id']);
      $q->markForDeletion();
      $q->save();

      $_SESSION['msg'] = "Blog deleted successfully.";

      echo json_encode(array(
        "success" => true
      ));
      exit;
          
    }

    // Render the dashboard
    static public function addBlog($rest) {
      
      global $config;

      $data = array();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $errors = Validation::required(array("title", "intro", "body"), $vars);

      if ($errors) {
        echo json_encode(array(
          "success" => false,
          "missing"  => $errors,
          "msg" => "Please complete the Title, Introduction and Body fields"
        ));
        exit;
      }

      $q = new Blog($vars['blog_id']);
      $q->setIntro($vars['intro']);
      $q->setTitle($vars['title']);
      $q->setBody($vars['body']);
      $q->setKeywords($vars['keywords']);
      if (!$vars['blog_id']) {
        $q->markNew();
      }
      $q->save();

      $_SESSION['msg'] = "Blog post ".($vars['blog_id']?"edited":"added")." successfully.";

      echo json_encode(array(
        "success" => true
      ));
      exit;
          
    }

    // Render the dashboard
    static public function renderEditBlog($rest) {
      
      global $config;

      $data = array();

      $h = $rest->getHierarchy();    
      $vars = $rest->getRequestVars();

      $data['id'] = $h[2];

      $data['post'] = new Blog($data['id']);

      echo View::renderView("admin_edit_blog", $data, false, true);
          
    }

  }

?>