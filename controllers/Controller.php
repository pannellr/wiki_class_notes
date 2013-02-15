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
      header("HTTP/1.0 404 Not Found");
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

  



}
