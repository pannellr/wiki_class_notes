<?php
require("Controller.php");
require("../models/Course.php");


class CourseController extends Controller{

  private $course;

  //constructor creates a new user instance
  function __construct(){
    $this->course = new Course();
  }


  //show method
  //@params $id the id of the row you would like to return
  //@params $where other conditions you would like to impose on the query
  function show($id, $where = false){

    //if the query provides a result
    if($result = $course->show($id, $where)){
      //require the view
      //it will use the $result to populate its data
      require("../views/show_course.php");
    } else {
      //throw an error
    }
  }

  //display the new form
  //Careful can't override new!
  function newCourse(){
    require("../views/new_course.php");
  }

  //process the information from new
  function create(){
  }

  //show all records from this table
  //@params where conditions you would like to add to query
  function all($where = false){

  }

  //select row and put the data into a form for editting
  //@param $id the id of the row you want to edit
  function edit($id){
  }

  function update($id, $params){
  }

  function destory($id){
  }


}