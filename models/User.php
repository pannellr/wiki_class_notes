<?php 
require("DB.php");
class Users extends DB{
	       

  //Constructor
  function __construct(){
    //Initializes private variable
    //Tells database to work in 'Users' table
    $this->$tableName = 'Users';
  }
  
  //Methods
}
?>