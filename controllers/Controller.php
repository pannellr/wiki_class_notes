<?php

require("../public/router.php");

class Controller{

function __construct(){
  //intialize user and router
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

}