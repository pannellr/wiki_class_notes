<?php

require("../public/Router.php");

class Controller{

  private $model;
  private $router;

  function __construct(){
    print_r($_GET);
    //intialize model and router
    //???may belong in child construct $this->model = new Model();
    $this->router = new Router();
    
    //container for any parameters passed through url
    $queryParams = false;
    
    if (strlen($_GET['query']) > 0){
      //explode query parameters into an array
      $queryParams = explode("/", $_GET['query']);
    }
    
    //passed by .htacess
    $page = $_GET['page'];
    
    //Query router hash table
    $endpoint = $this->router->lookup($page);

    if ($endpoint === false){
      //  header("HTTP/1.0 404 Not Found");
    } else {
      $this->$endpoint($queryParams);
    }
  }


  private function redirect($url){
    header("Location: /" . $url);
  }

  private function loadView($view, $data = null){
    if (is_array($data)){
      extract($data);
    }
    
    require("../views/" . $view . ".php");
  }

  private function loadView($view, $data = null){
    //if $data is an array(at least one key => value pair
    if (is_array($data)){
      //extract to make the separate keys in $data
      //into their own variables
      //for example ('id' => 3)
      //becomes the value 3 assigned to $id
      //these variables will be available to the view
      extract($data);
    }

    require("../views/" . $view . ".php");
  }

  private function loadPage($user, $view, $data = null, $flash = false){
    //load the header and pass it the $user object
    $this->loadView("header", array('user' => $user));

    //The flash class is our way of passing a message to our page
    if ($flash !== false){
      $flash->display();
    }

    //load our content
    $this->loadView($view, $data);

    //load the footer
    $this->loadView("footer");
  }

}
