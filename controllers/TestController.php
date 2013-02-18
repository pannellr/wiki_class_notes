<?php

require_once("Controller.php");

class TestController extends Controller{

  //Call the parent class constructor
  function __construct($method, $data){
    parent::__construct($method, $data);
    $this->model = new Test();
  }

  
  function test($data){
    //loadView in this case will:
    //1.load the header
    //2.load any content at test_show.php
    //3.load the footer
    //4.pass any params from the query string as $data
    $this->loadPage($user = null, "test_show", $data);
    
    //or to run a DB query you can use the model
    //$this->model->select(array("id"=> 15));
    //for the "query select * from tests where id = 15"
    //more on this soon
  }


}