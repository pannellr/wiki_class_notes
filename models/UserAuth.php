<?php 
//This 
require_once("DB.php");

class UserAuth extends DB{
	       
  public function __construct(){
    parent::__construct();
    parent::setTableName("userAuth");
  }

  //Checks to see if a user exists, if so, it authorizes the user
  public function attemptLogin($user){

  }
  
  //This unsets the authorization cookie
  public function logoutUser($hash){

  }
  
  //Returns a user object for a specified hash key stored as cookie
  // public function userForAuth($hash){
  //   $query = "SELECT username FROM userAuth WHERE hash = '";
  //   $query .= $hash."' LIMIT 1";
  //   $result = $this->dbh->query($query);
  //   if( $result->num_rows > 0 ) {
  //     $user = $result->fetch_object();
  //     return $user;
  //   } else {
  //     return false;
  //   }
  // }

  //Authorize user assigns a hash and stores it as a cookie and in the database's authentication system
  public function authorizeUser($user){
    //Create hash
    $chars = "qwertyuiopasdfghjklzxcvbnm123456789QWERTYUIOPASDFGHJKLZXCVBNM";
    $hash = sha1($user['user_name']);
    for($i=0; $i<12; $i++) {
      $hash .= $chars[rand(0, 60)];
    }
    $clause = array(
      "hash" => $hash,
      "user_name" => $user["user_name"],
      "user_id" => $user['id']
    );
    //print_r($clause);
    //Store in the database
    $this->insert($clause);

    //Set cookie for user
    setcookie("Auth", $hash);

    return $hash;

  }
  
}