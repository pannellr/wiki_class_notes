<?php

require_once("Controller.php");

class InstitutionController extends Controller implements ControllerInterface{

  //Call the parent class constructor
  function __construct($method, $data){
    parent::__construct($method, $data);
  }

  public function fresh(){
    $this->loadPage($user = null, "new_institution");
  }

  public function create($params){
    $this->model = new Institution();
    $insert_id = $this->model->insert($params);
    $this->redirect("wiki_class_notes/institution/all");
  }

  public function show($id){
    $this->model = new Institution();
    $institution = $this->model->select($id);
    $this->loadPage($user = null, "show_institution", $institution);
  }

  public function all(){
    $this->model = new Institution();
    $all = $this->model->select();
    $this->loadPage($user = null, "all_institutions", $all);
  }

  public function edit($id){
    $this->model = new Institution();
    $institution = $this->model->select($id);
    $this->loadPage($user = null, "edit_institution", $institution);
  }

  public function update($updates){
    $this->model = new Institution();
    $this->model->update($updates);
    $this->redirect("wiki_class_notes/institution/show?id=" . $updates['id']);
  }

  public function destroy($id){
    $this->model = new Institution;
    $this->model->delete($id);
    $this->redirect("wiki_class_notes/institution/all");
  }
  
}