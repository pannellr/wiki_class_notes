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
    $this->model = new Institution();
    $this->model->insert($params);
    $this->redirect("~pannell/wiki_class_notes/institution/all");
  }

  public function show($id){
  }

  public function all(){
    $this->model = new Institution();
    $all = $this->model->select();
    $this->loadPage($user = null, "all_institutions", $all);
  }

  public function edit($id){
  }

  public function update($updates){
    $this->model = new Institution();
    $this->model->update($id = 15, array("name" => "rickey", "fun" => "on monday"));

  }

  public function destroy($id){
  }
  
}