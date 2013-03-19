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

  public function join(){
    $userAuthModel = new UserAuth();
    $user = $userAuthModel->checkAuth();
    if( !empty($user) ){
      //get person id
      $userModel = new User();
      $where = array('id' => $user['user_id']);
      $result = $userModel->select($where);
      
      $person_id = $result[0]['person_id'];

      if(!empty($_GET['section_id'])){
        $this->model = new Student();

        $clause = array(
          "person_id" => $person_id,
          "section_id" => $_GET['section_id']
          );

        $this->model->insert($clause);

        $this->redirect("user/me");

      }
    }
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
    //check user authentication
    $userAuth = new UserAuth();
    $user = $userAuth->checkAuth();
    
    //get courses available to students
    $this->studentModel = new Student();
    $courses = $this->studentModel->availableCourses($user['id']);

    $this->loadPage($user, "student_join_class", $courses);
  }
  
}