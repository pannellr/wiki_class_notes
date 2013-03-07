<?php

require_once("Controller.php");

class NoteController extends Controller implements ControllerInterface{

  //Call the parent class constructor
  function __construct($method, $data){
    parent::__construct($method, $data);
  }

  public function fresh(){
    $course = new Course();
    $courses = $course->select();
    $this->loadPage($user = null, "new_note", $courses);
  }

  public function create($params){
    $this->model = new note();
    $insert_id = $this->model->insert($params);
    $this->redirect("note/all");
  }

  public function show($id){
    $this->model = new note();
    $note = $this->model->select($id);
    $this->loadPage($user = null, "show_note", $note);
  }

  public function all(){
    $this->model = new note();
    $all = $this->model->select();
    $this->loadPage($user = null, "all_notes", $all);
  }

  public function edit($id){
    $this->model = new note();
    $note = $this->model->select($id);
    $this->loadPage($user = null, "edit_note", $note);
  }

  public function update($updates){
    $this->model = new note();
    $this->model->update($updates);
    $this->redirect("note/show?id=" . $updates['id']);
  }

  public function destroy($id){
    $this->model = new note();
    $this->model->delete($id);
    $this->redirect("note/all");
  }
  
}