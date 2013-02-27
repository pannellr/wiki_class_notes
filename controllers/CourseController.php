<?php

require_once("Controller.php");

class CourseController extends Controller implements ControllerInterface{

  //Call the parent class constructor
  function __construct($method, $data){
    parent::__construct($method, $data);
  }

  public function fresh(){
    $dept = new Department();
    $departments = $dept->all();
    $this->loadPage($user = null, "new_course", $departments);
  }

  public function create($params){
    $this->model = new Course();
    $insert_id = $this->model->insert($params);
    $this->redirect("wiki_class_notes/course/all");
  }

  public function show($id){
    $this->model = new Course();
    $course = $this->model->select($id);
    $this->loadPage($user = null, "show_course", $course);
  }

  public function all(){
    $this->model = new Course();
    $all = $this->model->select();
    $this->loadPage($user = null, "all_courses", $all);
  }

  public function edit($id){
    $this->model = new Course();
    $course = $this->model->select($id);
    $this->loadPage($user = null, "edit_course", $course);
  }

  public function update($updates){
    $this->model = new Course();
    $this->model->update($updates);
    $this->redirect("wiki_class_notes/course/show?id=" . $updates['id']);
  }

  public function destroy($id){
    $this->model = new Course;
    $this->model->delete($id);
    $this->redirect("wiki_class_notes/course/all");
  }
  
}