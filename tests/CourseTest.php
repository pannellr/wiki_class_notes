<?php
require("UnitTest.php");
require("../controllers/CourseController.php");

class CourseTest extends UnitTest{

  public $course;

  function __construct(){
  }

  function testNew(){
    $course = new CourseController();
    $course->newCourse();
  }

}

$t = new CourseTest();

$t->testNew();