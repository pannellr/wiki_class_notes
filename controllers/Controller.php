<?php

require_once("../models/classes.php");
require_once("ControllerInterface.php");
require_once("Flash.php");

class Controller{

  //Every Controller will have a corresponding model
  public $model;

  //constructor called by all controller subclasses
  //@param $method is the method from the url
  //@param $data is everything that was in the
  //query string
  function __construct($method, $data = null){
    //first make sure that the method exists
    if (method_exists($this, $method)){
      //Call the method passing along the data if any
      //remember $this in this context refers to the 
      //subclass calling the constructor
      $this->$method($data);
    } else {
      //if the method doesn't exist go to an error page
      echo "Method does not exist: ";
      print_r($method);
      //$this->redirect("errors/404");
    }
  }


  public function redirect($url){
    header("Location: /" . $url);
  }

  public function loadView($view, $data = null){
    require("../views/" . $view . ".php");
  }

  public function loadPage($user, $view, $data = null, $flash = false){
    //the sendData array contains user key and other keys in data
    if(!empty($data)){
      $sendData = array_merge(array('user' => $user), $data);
    } else {
      $sendData = array('user' => $user);
    }

    //load the header and pass it the $user object
    $this->loadView("header", $sendData);

    //The flash class is our way of passing a message to our page
    if ($flash !== false){

      // echo "<pre>FLASH!";
      // print_r($flash);
      // echo "</pre>";

      foreach ($flash as $key => $value) {
        if( is_object($flash[$key]) ){
          $flash[$key]->display();
        }
      }
    }

    //load our content
    $this->loadView($view, $sendData);

    //load the footer
    $this->loadView("footer");
  }

  public function setModel($model){
    $this->model = $model;
  }
  
}
