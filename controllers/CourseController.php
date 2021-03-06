<?php

require_once("Controller.php");

class CourseController extends Controller implements ControllerInterface{

  //Call the parent class constructor
  function __construct($method, $data){
    parent::__construct($method, $data);
  }

  public function fresh(){
    $dept = new Department();
    $departments = $dept->select();
    $data['departments'] = $departments;
    $this->loadPage($this->user, "new_course", $data);
  }

  public function create($params){
    //insert course
    $this->model = new Course();
    $insert_id = $this->model->insert($params);

    $this->redirect("course/all");

    //insert section
    $section = new Section();
    $section_params = array(
			    'course_id' => $insert_id, 
			    'section_number' => '00'
			    );
    $section->insert($section_params);
  
    $this->redirect("student/courses");
  }

  public function show($params){
    $this->model = new Course();
    $data = array();
    //add course info
    $data['course'] = $this->model->getCourseData($params['section_id']);

    //add dates
    $data['dates'] = $this->model->getCourseNoteDates($params['section_id']);

    //add notes
    foreach ($data['dates'] as $key => $value) {
      $date = $data['dates'][$key]['date'];
      $data['dates'][$key]['notes'] 
	= $this->model->getNotesForDate($params['section_id'], $date);
    }
    $this->loadPage($this->user, "show_course", $data);
  }

  public function all(){
    $this->model = new Course();
    $courses = $this->model->select();
    $data['courses'] = $courses;
    $this->loadPage($this->user, "all_courses", $data);
  }

  public function edit($id){
    $this->model = new Course();
    $course = $this->model->select($id);
    $this->loadPage($this->user, "edit_course", $course);
  }

  public function update($updates){
    $this->model = new Course();
    $this->model->update($updates);
    $this->redirect("course/show?id=" . $updates['id']);
  }

  public function destroy($id){
    $this->model = new Course;
    $this->model->delete($id);
    $this->redirect("course/all");
  }
  
}