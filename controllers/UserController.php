<?php 

require_once("Controller.php");

class UserController extends Controller implements ControllerInterface {
  
  //Constructor
  function __construct($method, $data){
    parent::__construct($method, $data);
  }
  
  //Methods
  public function fresh(){
    $this->loadPage($user = null, "new_user");
  }
  //TODO: create authentication system
  public function login($data){
   // $this->model = new UserAuth();
    //$this->model->attemptLogin($data);
    $this->loadPage($user = null, "login_user");
  }

  public function logout(){
    $this->model = new UserAuth();
    $this->model->logoutUser($_COOKIE['Auth']);
  }

  //Check if user is logged in and pass the user's data to the page
  private function checkAuth(){
    $this->model = new UserAuth();
    if( isset($_COOKIE['Auth']) ) {
      return $this->model->userForAuth($_COOKIE['Auth']);
    } else {
      return  false;
    }
  }

  public function create($params){
    //TODO: VALIDATION GOES HERE
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    $birthday = $_POST['birth_year']."-".$_POST['birth_month']."-".$_POST['birth_day'];
    // echo $birthday;

    $personInfo = array(
      "first_name" => $_POST['first_name'],
      "last_name" => $_POST['last_name'],
      "birthday" => $birthday,
      "email" => $_POST['email']
    );

    
    $this->personModel = new People();
    $person_id = $this->personModel->insert($personInfo);

    $userInfo = array(
      "user_name" => $_POST['user_name'],
      "password" => $_POST['password'],
      "person_id" => $person_id
    );

    $this->userModel = new User();
    $this->userModel->insert($userInfo);

    $this->redirect("wiki_class_notes/user/all");
  }

  public function show($id){
    $this->model = new User();
    $data = $this->model->select($id);
    $this->loadPage($user = null, "show_user", $data);
  }

  public function all(){
    $this->model = new User();
    $all = $this->model->select();
    $this->loadPage($user = null, "all_users", $all);
  }

  public function edit($id){
    $this->model = new User();
    $data = $this->model->select($id);
    $this->loadPage($user = null, "edit_user", $data);
  }

  public function update($updates){
    $this->model = new User();
    $this->model->update($updates);
    $this->redirect("wiki_class_notes/user/show?id=" . $updates['id']);
  }

  public function destroy($id){
    $this->model = new User();
    $this->model->delete($id);
    $this->redirect("wiki_class_notes/user/all");
  }

  
}