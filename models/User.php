<?php 

require("DB.php");

class User extends DB{
	       
  //Constructor
  function __construct(){
    //Initializes private variable
    //Tells database to work in 'Users' table
    $this->$tableName = 'Users';
  }
  
  //Methods
}
?>