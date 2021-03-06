<?php 

require_once("Controller.php");

class UserController extends Controller implements ControllerInterface {
    //flashArray shows all possible validation errors
    private $flashArray = array(
      "0" => "Please enter a username.",
      "1" => "Please enter a password.",
      "2" => "Please enter a first name.",
      "3" => "Please enter a date of birth.",
      "4" => "Please enter a valid email address.",
      "5" => "Invalid username. Characters allowed: alpha-numeric, '_'. 
        Max length is 10 characters.",
      "6" => "Invalid password. Please enter 6 - 32 characters. 
          Spaces are not permitted.",
      "7" => "Invalid first or last name. Only characters allowed are alpha, 
        [ - ], [ ' ] and spaces.",
      "8" => "Invalid email address. Please enter a valid email address",
      "9" => "Passwords do not match. Please enter a valid password and try again.",
      "10" => "Emails do not match. Please enter a valid email address and try again. ",
      "11" => "Username is not available. Please choose another username.",
      "12" => "Email is already in use. Please choose another one 
        or recover your account.",
      "13" => "Please enter a last name.",
      "14" => "Invalid last name. Only characters allowed are alpha, 
        [ - ], [ ' ] and spaces.",
        "15" => "You are already logged in. Please log out.",
        "16" => "The credentials you have entered are invalid. Please try again.",
        "17" => "Please enter a valid username.",
        "18" => "Please enter a valid password."
    );

  //Constructor
  function __construct($method = null, $data = null){
    parent::__construct($method, $data);
  }
  
  //Methods
  public function fresh(){
    $this->loadPage($user = null, "new_user");
  }

  public function login(){
   $this->model = new UserAuth();
   $user = $this->model->checkAuth();
   if( $user !== false ) {
    $flash['logged_in'] = new Flash($this->flashArray[15], "error");
    $this->loadPage($user, "logout_user", false, $flash);
   } else {
    $this->loadPage($user = null, "login_user");
   }
  }

  public function authenticate(){
    //check if post is not empty
    if( !empty($_POST) ){
      //Validate the login
      $flash['user_name'] = $this->validate($_POST['user_name'], $output, "user_name", 17, 17, "/^[a-zA-Z0-9_]{1,10}$/");

      //Validate the password
      $flash['password'] = $this->validate($_POST['password'], $output, "password", 18, 18, "/^[a-zA-Z0-9\S]{6,32}$/");

      $flash_is_empty = true;
      
      foreach ($flash as $key => $value) {
        if( !empty($flash[$key]) ) {
          $flash_is_empty = false;
        }
      }

      if( $flash_is_empty ){
        $this->model = new UserAuth();
        $user = $this->model->attemptLogin($output['user_name'], hash("sha256", $output['password']));
        if( !empty($user) ) {
          $this->model->authorizeUser($user[0]);
          $this->redirect("home/home");
        } else {
          $flash['no_match'] = new Flash($this->flashArray[16], "error");
          $this->loadPage($this->user, "login_user", false, $flash);
        }
      } else {
        $this->loadPage($this->user, "login_user", false, $flash);
      }
    }
  }

  public function logout(){
    $this->model = new UserAuth();
    if( isset($_COOKIE['Auth']) ){
      $this->model->logoutUser($_COOKIE['Auth']);
      setcookie("Auth", "", time() - 3600);
    }
    
    $this->redirect("user/login");
  }

  //Shows information about logged in user
  public function me(){
    //check cookie for authentication
    $userAuthModel = new UserAuth();
    $user = $userAuthModel->checkAuth();
    
    if(!empty($user)){
      $data = array();

      //select user data from users table
      $userModel = new User();
      $where = array('id' => $user['user_id']);
      $result = $userModel->select($where);
      $data['user_info'] = $result[0];

      //select user's classes
      $studentModel = new Student();
      $where = $user['user_id'];
      $data['courses'] = $studentModel->courses($where);

      //add person_id
      $data['person_id'] = $data['user_info']['person_id'];

      $this->loadPage($this->user, "user_profile", $data);

    } else {
      $this->loadPage(false, "login_user");
    }
    
  }

  public function validate($post, &$output, $key, $on_no_match, $on_empty, $regex){
    if( !empty($post) ) {
      if( preg_match($regex, $post) === 1 ) {
        //Validation passed!
        $output[$key] = $post;
      } else {
        $flash[$key] = new Flash($this->flashArray[$on_no_match], "error");
        return $flash[$key];
      }
    } else {
      $flash[$key] = new Flash($this->flashArray[$on_empty], "error");
      return $flash[$key];
    }
  }
  public function create($params) {
    //initially set flash as false
    $flash = false;

    //create an input array that will hold sanitized values
    $output = array(
      "user_name" => "",
      "password" => "",
      "first_name" => "",
      "last_name" => "",
      "date_of_birth" => "",
      "email" => ""
      );

    //Validate the username
    $flash['user_name'] = $this->validate($_POST['user_name'], $output, "user_name", 5, 0, "/^[a-zA-Z0-9_]{1,10}$/");
    
    //Validate the password
    //Strict Password, length 6 to 32 include one alpha, one number and one symbol
    //$flash['password'] = $this->validate($_POST['password'], $output, "password", 6, 1, "/^(?=.*\d)(?=.*[^a-zA-Z0-9])(?=.*[a-z])(?=.*[A-Z]).{6,32}$/");
    //More flexible password requirements
    $flash['password'] = $this->validate($_POST['password'], $output, "password", 6, 1, "/^[a-zA-Z0-9\S]{6,32}$/");

    if( $_POST['password'] !== $_POST['confirm_password']  ) {
      $flash['password'] = new Flash($this->flashArray[9], "error");
    }

    //Validate the first and last names
    $flash['first_name'] = $this->validate($_POST['first_name'], $output, "first_name", 7, 2, "/^[ a-zA-ZáêéèêíîóúüÁÉÍÓÚÜ']{1,20}$/");
    $flash['last_name'] = $this->validate($_POST['last_name'], $output, "last_name", 14, 13, "/^[ a-zA-ZáêéèêíîóúüÁÉÍÓÚÜ']{1,20}$/");

    //Validate date of birth
    $flash['date_of_birth'] = $this->validate($_POST['date_of_birth'], $output, "date_of_birth", 3, 3, "/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/");

    //Validate email address
    $flash['email'] = $this->validate($_POST['email'], $output, "email", 4, 4, "/^[a-zA-Z0-9!\#$%&'*+-\/=?^_`{|}~\.]+@[a-zA-Z0-9-.]*\.[a-zA-Z]{2,4}$/");
    if( $_POST['email'] !== $_POST['confirm_email']  ) {
      $flash['email'] = new Flash($this->flashArray[10], "error");
    }
    
    //Check if all flashes are empty
    $flash_is_empty = true;
    foreach ($flash as $key => $value) {
      if( !empty($flash[$key]) ) {
        $flash_is_empty = false;
      }
    }

    //If no flashes, check database
    if( $flash_is_empty ) {

      //Create a model for the people table and user table
      $this->personModel = new People();
      $this->userModel = new User();

      //Check database for email already used
      $where = array(
        "email" => $output['email']
      );
      $peopleResult = $this->personModel->select($where);
      if( !empty($peopleResult) ) {
        $flash['email'] = new Flash($this->flashArray[12], "error");
      }

      //Check database for user_name already used
      $where = array(
        "user_name" => $output['user_name']
      );
      $userResult = $this->userModel->select($where);
      if( !empty($userResult) ) {
        $flash['user_name'] = new Flash($this->flashArray[11], "error");
      }

      //Insert user into database
      if( empty($peopleResult) && empty($userResult) ){

        //Enter values into people database
        $personInfo = array(
          "first_name" => $output['first_name'],
          "last_name" => $output['last_name'],
          "birthday" => $output['date_of_birth'],
          "email" => $output['email']
        );

        $person_id = $this->personModel->insert($personInfo);

        $userInfo = array(
        "user_name" => $output['user_name'],
        "password" => hash("sha256", $output['password']),
        "person_id" => $person_id
        );

      
        $user_id = $this->userModel->insert($userInfo);
        $user = $this->userModel->select(array("id"=>$user_id));
        $user = $user[0];

        //Create authentication hash for user
        $this->userAuthModel = new UserAuth();
        $hash = $this->userAuthModel->authorizeUser($user);

        $this->redirect("home/home");
        //The line below does not work because of the way we are 
        //checking to see if the user is authenticated upon creation
        //$this->loadPage($user, "user_profile", array("user" => $user));

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
    $this->redirect("show?id=" . $updates['id']);
  }

  public function destroy($id){
    $this->model = new User();
    $this->model->delete($id);
    $this->redirect("all");
  }

  
}
