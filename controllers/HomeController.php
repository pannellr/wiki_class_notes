<?php

require_once("Controller.php");

class HomeController extends Controller implements ControllerInterface{

  //Call the parent class constructor
  function __construct($method, $data){
    parent::__construct($method, $data);
  }


  public function home(){
    $user = new UserAuth();
    $u = $user->checkAuth();
    if (empty($u)){
      $this->loadPage($u = null, "login_user");
    } else {
      $this->redirect("student/classes");
    }
  }

  //interface methods

  public function fresh(){
  }

  public function create($params){
  }

  public function show($id){
  }

  public function all(){
  }

  public function edit($id){
  }

  public function update($updates){
  }

  public function destroy($id){
  }
  
}