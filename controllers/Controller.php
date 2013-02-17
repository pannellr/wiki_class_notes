<?php

require_once("../models/classes.php");


class Controller{

  //Every Controller will have a corresponding model
  private $model;

  //constructor called by all controller subclasses
  //@param $method is the method from the url
  //@param $data is everything that was in the
  //query string
  function __construct($method, $data){
    //first make sure that the method exists
    if (method_exists($this, $method)){
      //Call the method passing along the data if any
      //remember $this in this context refers to the 
      //subclass calling the constructor
      $this->$method($data);
    } else {
      //if the method doesn't exist go to an error page
      header("../errors/error404.html");
    }
  }

  private function redirect($url){
    header("Location: /" . $url);
  }

  public function loadView($view, $data = null){
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

  public function loadPage($user, $view, $data = null, $flash = false){
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
