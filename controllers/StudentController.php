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
    $this->loadPage($this->user, "student/fresh", $courses);
  }

  public function create($params){
    $this->model = new Student();
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
  }
  
  public function courses(){
    //$this->userAuthModel = new UserAuth();
    //$user = $this->userAuthModel->checkAuth();
    if (empty($this->user)){
      $this->loadPage($this->user, "login_user");
    } else {
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
  }

  public function addCourse(){    
    //get courses available to students
    $this->model = new Student();
    $courses = $this->model->availableCourses($user['id']);
    $this->loadPage($this->user, "student_join_class", $courses);
  }
  
}