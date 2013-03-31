<?php

require_once("../models/classes.php");
require_once("ControllerInterface.php");
require_once("Flash.php");

class Controller{

  //Every Controller will have a corresponding model
  public $model;
  //Create a User object to pass to every page
  public $user;
  //link prefix for servers with strange configurations
  public $linkPrefix = '';

  //constructor called by all controller subclasses
  //@param $method is the method from the url
  //@param $data is everything that was in the
  //query string
  function __construct($method, $data = null){

    //create the UserAuth object
    $userAuth = new UserAuth();
    $this->user = $userAuth->checkAuth();

    //first make sure that the method exists
    if (method_exists($this, $method)){
      //Call the method passing along the data if any
      //remember $this in this context refers to the 
      //subclass calling the constructor
      $this->$method($data);
    } else {
      //if the method doesn't exist go to an error page
      echo "Method does not exist: ";
      $this->redirect("errors/404");
    }
  }


  public function redirect($url){
    header("Location: " . $this->linkPrefix . "/" . $url);
  }

  public function loadView($view, $data = null){
    if (!is_null($data)){
      extract($data);
    }

    require("../views/" . $view . ".php");
  }

  public function loadPage($user, $view, $data = null, $flash = false){
    //add user to $data array
    $data['user'] = $user;

    $data['link_prefix'] = $this->linkPrefix;

    //load the header and pass it the $user object
    

    $this->loadView("header", $data);

    //The flash class is our way of passing a message to our page
    if ($flash !== false){
      foreach ($flash as $key => $value) {
        if( is_object($flash[$key]) ){
          $flash[$key]->display();
        }
      }
    }


    //allow user to sign up if they are not logged in
    $notLoggedInUrl = '';

    switch($view) {
      case 'new_user':
	$notLoggedInUrl = 'new_user';
	break;
      case 'login_user':
	$notLoggedInUrl = 'login_user';
	break;
    }


    //load our content or redirect to login
    empty($this->user) || is_null($this->user) ?
      $this->loadView($notLoggedInUrl, $data) :
      $this->loadView($view, $data);

    //load the footer
    $this->loadView("footer");
  }

  public function setModel($model){
    $this->model = $model;
  }
  
}
