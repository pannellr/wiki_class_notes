<?php

require_once("Controller.php");

class InstitutionController extends Controller implements ControllerInterface{

  //Call the parent class constructor
  function __construct($method, $data){
    parent::__construct($method, $data);
  }

  public function fresh(){
    $this->loadPage($this->user, "new_institution");
  }

  public function create($params){
    $this->model = new Institution();
    $insert_id = $this->model->insert($params);
    $this->redirect("institution/all");
  }

  public function show($id){
    $this->model = new Institution();
    $institution = $this->model->select($id);
    $this->loadPage($this->user, "show_institution", $institution);
  }

  public function all(){
    $this->model = new Institution();
    $all = $this->model->select();
    $data['schools'] = $all;
    $this->loadPage($this->user, "all_institutions", $data);
  }

  public function edit($id){
    $this->model = new Institution();
    $institution = $this->model->select($id);
    $this->loadPage($this->user, "edit_institution", $institution);
  }

  public function update($updates){
    $this->model = new Institution();
    $this->model->update($updates);
    $this->redirect("institution/show?id=" . $updates['id']);
  }

  public function destroy($id){
    $this->model = new Institution();
    $this->model->delete($id);
    $this->redirect("institution/all");
  }
  
}