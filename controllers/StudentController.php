<?php

require_once("Controller.php");

class StudentController extends Controller implements ControllerInterface{

  //Call the parent class constructor
  function __construct($method, $data){
    parent::__construct($method, $data);
  }

  public function fresh(){
    $course = new Course;
    $courses = $course->allWithSectionId();
    $data['courses'] = $courses;
    $this->loadPage($this->user, "new_student", $data);
  }

  public function create($params){
    $this->model = new Student();

    //get person_id using user_id
    $u = new User();
    $person_id = $u->select(array('id' => $this->user['user_id']));
    //add user_id to $params
    $params['person_id'] = $person_id[0]['person_id'];

    $insert_id = $this->model->insert($params);
    $this->redirect("student/courses");
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
    //Get person_id from user object
     $user = new User();
     $person_id = $user->select(array('id' => $this->user['user_id']));
     $this->model = new Student;
     $this->model->dropCourse($person_id[0]['person_id'], $id['section_id']);
     $this->redirect("student/courses");
  }
  
  public function courses(){
    //fetch student courses
    $student = new Student;
    $courses = $student->courses($this->user['user_id']);
    //fetch person_id using user
    $this->model = new User();
    $person_id = $this->model->select(array('id' => $this->user['user_id']));
    
    $data = [
	     'courses' => $courses, 
	     'person_id' => $person_id[0]['person_id']
	     ];
    $this->loadPage($this->user, "student_classes", $data);
  }

  public function addCourse(){    
    //get courses available to students
    $this->model = new Student();
    $courses = $this->model->availableCourses($user['id']);
    $this->loadPage($this->user, "student_join_class", $courses);
  }
  
}
