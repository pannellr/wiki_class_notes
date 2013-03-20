<?php

require_once("Controller.php");

class SectionController extends Controller implements ControllerInterface{

  //Call the parent class constructor
  function __construct($method, $data){
    parent::__construct($method, $data);
  }

  public function fresh(){

    $course = new Course();
    $courses = $course->select();
    
    $schedule = new SectionSchedule();
    $schedules = $schedule->select();
    
    $textbook = new Textbook();
    $textbooks = $textbook->select();

    $semester = new Semester();
    $semesters = $semester->select();

    //add each set a values to an associative array
    //to make it easy to pull the lists out by the key
    $data = array("schedules" => $schedules,
		  "textbooks" => $textbooks,
		  "semesters" => $semesters,
		  "courses"   => $courses
		  );

    $this->loadPage($this->user, "new_section", $data);
  }

  public function create($params){
    $this->model = new Section();
    $insert_id = $this->model->insert($params);
    $this->redirect("section/all");
  }

  public function show($id){
    $this->model = new Section();
    $section = $this->model->select($id);
    $this->loadPage($this->user, "show_section", $section);
  }

  public function all(){
    $this->model = new Section();
    $all = $this->model->select();
    $this->loadPage($this->user, "all_sections", $all);
  }

  public function edit($id){
    $this->model = new Section();
    $section = $this->model->select($id);
    $this->loadPage($this->user, "edit_section", $section);
  }

  public function update($updates){
    $this->model = new Section();
    $this->model->update($updates);
    $this->redirect("section/show?id=" . $updates['id']);
  }

  public function destroy($id){
    $this->model = new Section();
    $this->model->delete($id);
    $this->redirect("section/all");
  }
  
}
