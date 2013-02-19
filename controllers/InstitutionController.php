<?php

require_once("Controller.php");

class InstitutionController extends Controller implements ControllerInterface{

  //Call the parent class constructor
  function __construct($method, $data){
    parent::__construct($method, $data);
    $this->model = new Institution();
  }

  public function fresh(){
    $this->loadPage($user = null, "new_institution");
  }

  public function create($params){
  }

  public function show($id){
  }

  public function all(){
    $this->model = new Institution();
    $allInstitutions = $this->model->select();
    $this->loadPage($user = null, "all_institutions", $allInstitutions);
  }

  public function edit($id){
  }

  public function update($updates){
  }

  public function destroy($id){
  }
  
}