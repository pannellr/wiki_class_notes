<?php 

require_once("Controller.php");

class UserController extends Controller {
  
  //Constructor
  function __construct($method, $data){
    parent::__construct($method, $data);
    $this->model = new User();
  }
  
  //Methods
  function signUp(){
    $this->loadPage($u = null, "new_user");
  }
  
}
?>