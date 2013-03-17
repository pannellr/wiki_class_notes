<?php

require_once("Controller.php");

class HomeController extends Controller implements ControllerInterface{

  //Call the parent class constructor
  function __construct($method, $data){
    parent::__construct($method, $data);
  }


  public function home(){
    //home doesn't need a model
    //it can use all the other models to get its data
    $user = new User;
    $u = $user->checkAuth();
    $this->loadPage($u, "home");
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