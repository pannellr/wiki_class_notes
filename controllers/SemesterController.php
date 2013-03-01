<?php

require_once("Controller.php");

class SemesterController extends Controller implements ControllerInterface{

  //Call the parent class constructor
  function __construct($method, $data){
    parent::__construct($method, $data);
  }

  public function fresh(){
    $this->loadPage($user = null, "new_semester");
  }

  public function create($params){
    $this->model = new Semester();
    $insert_id = $this->model->insert($params);
    $this->redirect("wiki_class_notes/semester/all");
  }

  public function show($id){
    $this->model = new Semester();
    $semester = $this->model->select($id);
    $this->loadPage($user = null, "show_semester", $semester);
  }

  public function all(){
    $this->model = new Semester();
    $all = $this->model->select();
    $this->loadPage($user = null, "all_semesters", $all);
  }

  public function edit($id){
    $this->model = new Semester();
    $semester = $this->model->select($id);
    $this->loadPage($user = null, "edit_semester", $semester);
  }

  public function update($updates){
    $this->model = new Semester();
    $this->model->update($updates);
    $this->redirect("wiki_class_notes/semester/show?id=" . $updates['id']);
  }

  public function destroy($id){
    $this->model = new Semester();
    $this->model->delete($id);
    $this->redirect("wiki_class_notes/semester/all");
  }
  
}