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
   //$this->model = new UserAuth();
    //$this->model->attemptLogin($data);
    $this->loadPage($user = null, "login_user");
  }

  public function logout(){
    $this->model = new UserAuth();
    $this->model->logoutUser($_COOKIE['Auth']);
  }

  //Check if user is logged in and pass the user's data to the page
  function checkAuth(){
    $this->model = new UserAuth();
    if( isset($_COOKIE['Auth']) ) {
      $result =  $this->model->select(array("hash"=>$_COOKIE['Auth']));
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

  public function create($params) {
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
      "10" => "Emails do not match. Please enter a valid email address and try again. ",
      "11" => "Username is not available. Please choose another username.",
      "12" => "Email is already in use. Please choose another one or recover your account."
    );

    //initially set flash as false
    $flash = false;

    //Validate the username
    if( isset($_POST['user_name']) ) {
      if( preg_match("/^[a-zA-Z0-9_]{1,10}$/", $_POST['user_name']) === 1 ) {
        //Validation passed!
        $user_name = $_POST['user_name'];
        $flash['user_name'] = false;
      } else {
        $flash['user_name'] = new Flash($flashArray[5], "error");
      }
    } else {
      $flash['user_name'] = new Flash($flashArray[0], "error");
    }
    
    //Validate the password
    if( isset($_POST['password']) ) {
      if( $_POST['password'] === $_POST['confirm_password'] ) {
        if( preg_match("/^(?=.*\d)(?=.*[^a-zA-Z0-9])(?=.*[a-z])(?=.*[A-Z]).{6,32}$/", $_POST['password']) === 1 ) {
          //Validation passed!
          $password = hash('sha256', $_POST['password']);
          $flash['password'] = false;
        } else {
          $flash['password'] = new Flash($flashArray[6], "error");
        }
      } else {
        $flash['password'] = new Flash($flashArray[9], "error");
      }
    } else {
      $flash['password'] = new Flash($flashArray[1], "error");
    }

    //Validate the first and last names
    if( isset($_POST['first_name']) && isset($_POST['last_name']) ) {
      if( preg_match("/^[ a-zA-ZáêéèêíîóúüÁÉÍÓÚÜ']{1,20}$/", $_POST['first_name']) === 1 
     && preg_match("/^[ a-zA-ZáêéèêíîóúüÁÉÍÓÚÜ']{1,20}$/", $_POST['last_name']) === 1 ) {
        //Validation passed!
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $flash['name'] = false;
      } else {
        $flash['name'] = new Flash($flashArray[7], "error");
      }
    } else {
      $flash['name'] = new Flash($flashArray[2], "error");
    }

    //Validate date of birth
    if( isset($_POST['date_of_birth']) ) {
      if( preg_match("/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/", $_POST['date_of_birth']) === 1 ) {
        //Validation passed!
        $birthday = $_POST['date_of_birth'];
        $flash['date_of_birth'] = false;
      } else {
        $flash['date_of_birth'] = new Flash($flashArray[3], "error");
      }
    } else {
      $flash['date_of_birth'] = new Flash($flashArray[3], "error");
    }

    //Validate email address
    if( isset($_POST['email']) ) {
      if( $_POST['email'] === $_POST['confirm_email'] ) {
        if( preg_match("/^[a-zA-Z0-9!\#$%&'*+-\/=?^_`{|}~\.]+@[a-zA-Z0-9-.]*\.[a-zA-Z]{2,4}$/", $_POST['email']) === 1 ) {
          $email = $_POST['email'];
          $flash['email'] = false;
        } else {
          $flash['email'] = new Flash($flashArray[4], "error");
        }
      } else {
        $flash['email'] = new Flash($flashArray[10], "error");
      }
    } else {
      $flash['email'] = new Flash($flashArray[4], "error");
    }

    //If no flashes, check database
    print_r($flash);
    if($flash === false) {
      //Create a model for the people table and user table
      $this->personModel = new People();
      $this->userModel = new User();
      
      //Check database for email already used
      $where = array(
        "email" => $email
      );
      $peopleResult = $this->personModel->select($where);
      if( !empty($peopleResult) ) {
        $flash['email'] = new Flash($flashArray[12], "error");
        echo "ERROR! Email is in database already!!!";
      }

      //Check database for user_name already used
      $where = array(
        "user_name" => $user_name
      );
      $userResult = $this->userModel->select($where);
      if( !empty($userResult) ) {
        $flash['user_name'] = new Flash($flashArray[11], "error");
        echo "ERROR! Username is in database already!!!";
      }

      echo "Is email in use? ";
      print_r(empty($peopleResult));

      echo "Is user_name is use? ";
      print_r(empty($userResult));

      //Insert user into database
      if( empty($peopleResult) && empty($userPeople) ){
        //Enter values into people database
        $personInfo = array(
          "first_name" => $first_name,
          "last_name" => $last_name,
          "date_of_birth" => $date_of_birth,
          "email" => $email
        );

        $person_id = $this->personModel->insert($personInfo);

        $userInfo = array(
        "user_name" => $_POST['user_name'],
        "password" => $_POST['password'],
        "person_id" => $person_id
        );

      
        $user_id = $this->userModel->insert($userInfo);
        $user = $this->userModel->select(array("id"=>$user_id));
        $user = $user[0];

        //Create authentication hash for user
        $this->userAuthModel = new UserAuth();
        $hash = $this->userAuthModel->authorizeUser($user);

        $this->loadPage($user, "show_me", array("user" => $user));

      }//end if validated, insert into database

      else {
        $this->loadPage(null, "new_user", null, $flash);
      }
  } //end if fields are validated

  else {
    $this->loadPage(null, "new_user", null, $flash);
  }

}//end function create()

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