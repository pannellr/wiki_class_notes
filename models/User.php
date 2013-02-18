<?php 

require_once("DB.php");

class User extends DB{
	       
  //Constructor
  function __construct(){
    parent::setTableName("users");
  }
  
  //Methods
}
?>