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
      $result =  $this->model->select(array("hash"=>$_COOKIE['Auth']));
      print_r($result[0]);
      return $result[0];
    } else {
      return  false;
    }
  }

  //Shows information about logged in user
  public function me(){
    $user = $this->checkAuth();
    $this->model = new User();
    //TODO: get userinfo from USER table, not AUTH table
    $this->loadPage($user[0], "show_me", $user[0]);
  }

  public function create($params){
    //flashArray shows all possible validation errors
    $flashArray = array(
      "0" => "Please enter a username.",
      "1" => "Please enter a password.",
      "2" => "Please enter a first and last name.",
      "3" => "Please enter a date of birth.",
      "4" => "Please enter a valid email address.",
      "5" => "Invalid username. Characters allowed: alpha-numeric, '_'. Max length is 10 characters.",
      "6" => "Invalid password. Please enter 6 - 32 characters. Include one letter, one number and character that is not alpha-numeric. Spaces are not allowed.",
      "7" => "Invalid first or last name. Only characters allowed are alpha, [ - ], [ ' ] and spaces",
      "8" => "Invalid email address. Please enter a valid email address",
      "9" => "Passwords do not match. Please enter a valid password and try again.",
      "10" => "Emails do not match. Please enter a valid email address and try again. "
    );
    print_r($_POST);

    //Validate the username
    if( isset($_POST['user_name']) ) {
      if( preg_match("/^[a-zA-Z0-9_]{1,10}$/", $_POST['user_name']) === 1 ) {
        $user_name = $_POST['user_name'];
      } else {
        $flash = new Flash($flashArray[5], "error");
      }
    } else {
      $flash = new Flash($flashArray[0], "error");
    }

    //Validate the password
    if( isset($_POST['password']) ) {
      if( $_POST['password'] === $_POST['confirm_password'] ) {
        if( preg_match("/^(?=.*\d)(?=.*[^a-zA-Z0-9])(?=.*[a-z])(?=.*[A-Z]).{6,32}$/", $_POST['password']) === 1 ) {
          $password = hash('sha256', $_POST['password']);
        } else {
          $flash = new Flash($flashArray[6], "error");
        }
      } else {
        $flash = new Flash($flashArray[9], "error");
      }
    } else {
      $flash = new Flash($flashArray[1], "error");
    }

    //Validate the first and last names
    if( isset($_POST['first_name']) && isset($_POST['last_name']) ) {
      if( preg_match("/^[ a-zA-ZáêéèêíîóúüÁÉÍÓÚÜ']{1,20}$/", $_POST['first_name']) === 1 
     && preg_match("/^[ a-zA-ZáêéèêíîóúüÁÉÍÓÚÜ']{1,20}$/", $_POST['last_name']) === 1 ) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
      } else {
        $flash = new Flash($flashArray[7], "error");
      }
    } else {
      $flash = new Flash($flashArray[2], "error");
    }

    //Validate date of birth
    if( isset($_POST['birth_year']) && isset($_POST['birth_month']) && isset($_POST['birth_day']) ) {
      if( preg_match("/^(19|20)[0-9]{2}$/", $_POST['birth_year']) === 1 
          && preg_match("/^(0[0-9]|[1-9]|1(0|1|2))$/", $_POST['birth_month']) === 1 
          && preg_match("/^(0[0-9]|[1-9]|(1|2)[0-9]|3(0|1|2))$/", $_POST['birth_day']) === 1 ) {
        $birthday = $_POST['birth_year']."-".$_POST['birth_month']."-".$_POST['birth_day'];
      } else {
        $flash = new Flash($flashArray[3], "error");
      }
    } else {
      $flash = new Flash($flashArray[3], "error");
    }

    //Validate email address
    if( isset($_POST['email']) ) {
      if( $_POST['email'] === $_POST['confirm_email'] ) {
        if( preg_match("/^[a-zA-Z0-9!\#$%&'*+-/=?^_`{|}~\.]+@[a-zA-Z0-9-.]*\.[a-zA-Z]{2,4}$/", $_POST['email']) === 1 ) {
          $email = $_POST['email'];
        } else {
          $flash = new Flash($flashArray[4], "error");
        }
      } else {
        $flash = new Flash($flashArray[10], "error");
      }
    } else {
      $flash = new Flash($flashArray[4], "error");
    }



    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    
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
    $user_id = $this->userModel->insert($userInfo);
    $user = $this->userModel->select(array("id"=>$user_id));
    $user = $user[0];
    //print_r($user);

    //Create authentication hash for user
    $this->userAuthModel = new UserAuth();
    $hash = $this->userAuthModel->authorizeUser($user);

    $this->redirect("user/me");
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