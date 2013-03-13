<?php

//Require all of the controllers
require("../controllers/controllers.php");

//.htaccess passes the class name through a GET request
//make the first letter uppercase and store it in controller
$model = ucfirst($_GET['class']);    
$controller = toCamelCase($model, true) . 'Controller';

//.htaccess passes the method through a GET request
//it is in the not_camel_case style
//use toCamelCaseMethod below 
$method = toCamelCase($_GET['method']);

//Remove the class and the method indexes
//so the remaining GET params canned be passed by the method
unset($_GET['class']);
unset($_GET['method']);

//Create a controller instance
if (class_exists($controller)){
    $app = new $controller($method, $_GET);
  } else {
    throw new Exception("Invalid Controller");
  }
//Untility to convert underscore names
//to camelCase
//!!Need to add second arg for ucase first this might
//!!be needed for a two word model like course_sections
function toCamelCase($string, $first = false){
  $strings = explode("_", $string);
  $camelCased = '';
  if ($first){
    $camelCased .= ucfirst($strings[0]);
  } else {
    $camelCased .= lcfirst($strings[0]);
  }

  //start at 1, skipping the first string
  for ($i = 1; $i < count($strings); $i++){
    $camelCased .= ucfirst($strings[$i]);
  }
  return $camelCased;
}