<?php 
//This 
require_once("DB.php");

class UserAuth extends DB{
	       
  public function __construct(){
    parent::__construct();
    parent::setTableName("userAuth");
  }

  //Checks to see if a user exists, if so, it authorizes the user
  private function attemptLogin($user){

  }
  
  //This unsets the authorization cookie
  private function logoutUser($hash){

  }
  
  //Returns a user object for a specified hash key stored as cookie
  private function userForAuth($hash){

  }

  //Authorize user assigns a hash and stores it as a cookie and in the database's authentication system
  private function authorizeUser($user){

  }
  
}