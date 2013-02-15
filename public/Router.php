<?php

class Router{

  private $routes;

  function __construct(){
    $this->routes= array(
			 "test" => "test"
			 );
  }

   public function lookup($query){
      if (array_key_exists($query, $this->routes)){
	return $this->routes[$query];
      } else {
	return false;
      }
   }
   
}