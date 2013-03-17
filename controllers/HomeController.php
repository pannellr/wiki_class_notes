<?php

require_once("Controller.php");

class HomeController extends Controller implements ControllerInterface{

  //Call the parent class constructor
  function __construct($method, $data){
    parent::__construct($method, $data);
  }


  public function home(){
    $user = new UserAuth();
    //print_r($user);
    print_r($user->checkAuth());
    $u = $user->checkAuth();
    print_r($u);
    //$this->loadPage($u, "home");
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