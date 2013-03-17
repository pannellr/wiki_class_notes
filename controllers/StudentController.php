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

  public function classes(){
    $user = new UserAuth();
    $u = $user->checkAuth();
    if (empty($u)){
      $this->loadPage($u = null, "login_user");
    } else {
      $student = new Student;
      $classes = $student->classes($u['user_id']);
      $this->loadPage($u, "student_classes", $classes);
    }
  }

  public function addClass(){
    $user = new UserAuth();
    $u = $user->checkAuth();
    $student = new Student;
    $courses = $student->availableCourses();
    $this->loadPage($u, "student_join_class", $courses);
  }
  
}