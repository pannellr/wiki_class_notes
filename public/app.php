<?php

//Reqire all of the controllers
require("../controllers/controllers.php");

//.htaccess passes the class name through a GET request
//make the first letter uppercase and store it in controller   
$controller = ucfirst($_GET['class']) . 'Controller';

//.htaccess passes the method through a GET request
//it is in the not_camel_case style
//use toCamelCaseMethod below 
$method = toCamelCase($_GET['method']);

//Remove the class and the method indexes
//so the remaining GET params canned be passed by the method
unset($_GET['class']);
unset($_GET['method']);

//Create a controller instance
$app = new $controller();

//Call the method passing the parameters 
//that remain in the GET request
$app->$method($_GET);

//Untility to convert underscore names
//to camelCase
function toCamelCase($string){
  $strings = explode("_", $string);
  
  $camelCased = lcfirst($strings[0]);
  //start at 1, skipping the first string
  for ($i = 1; $i < count($stings); $i++){
    $camelCased .= $stings[$i];
  }

  return $camelCased;
}