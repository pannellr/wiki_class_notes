<?php

require_once("Controller.php");

class StudentController extends Controller implements ControllerInterface{

  //Call the parent class constructor
  function __construct($method, $data){
    parent::__construct($method, $data);
  }

  public function fresh(){
  }

  public function create($params){
    print_r($params);
    $this->model = new Student();
    $insert_id = $this->model->insert($params);
    $this->redirect("student/classes");
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

  public function join(){
   
  }

  public function courses(){
    $this->userAuthModel = new UserAuth();
    $user = $this->userAuthModel->checkAuth();

    // $userAuth = new UserAuth();
    // $u = $userAuth->checkAuth();

    if (empty($user)){
      $this->loadPage($user = null, "login_user");
    } else {
      //fetch student courses
      $student = new Student;
      $courses = $student->courses($user['user_id']);
      //fetch person_id using user
      $this->userModel = new User();
      $person_id = $this->userModel->select(array('id' => $user['user_id']));

      $data = ['courses' => $courses, 'person_id' => $person_id[0]['person_id']];
      $this->loadPage($user, "student_classes", $data);
    }
  }

  public function addCourse(){
    $this->userAuthModel = new UserAuth();
    $user = $this->userAuthModel->checkAuth();
    
    $this->studentModel = new Student();
    $courses = $this->studentModel->availableCourses();

    $this->loadPage($user, "student_join_class", $courses);
  }
  
}