<?php

require("Controller.php");

class TestController extends Controller{

  //Call the parent class constructor
  function __construct($method, $data){
    parent::__construct($method, $data);
  }

  
  function test($data){
    //loadView in this case will:
    //1.load the header
    //2.load any content at test_show.php
    //3.load the footer
    //4.pass any params from the query string as $data
    $this->loadPage($user = null, "test_show", $data);
  }


}