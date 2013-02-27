<?php 

require_once("DB.php");

class User extends DB{
	       
  public function __construct(){
    parent::__construct();
    parent::setTableName("users");
  }
  
}