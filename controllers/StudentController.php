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

  public function classes(){
    $userAuth = new UserAuth();
    $u = $userAuth->checkAuth();
    if (empty($u)){
      $this->loadPage($u = null, "login_user");
    } else {
      //fetch student classes
      $student = new Student;
      $classes = $student->classes($u['user_id']);
      //fetch person_id using user
      $user = new User();
      $person_id = $user->select(array('id' => $u['user_id']));

      $data = ['classes' => $classes, 'person_id' => $person_id[0]['person_id']];
      $this->loadPage($u, "student_classes", $data);
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