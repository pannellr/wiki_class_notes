<?php

require_once("DB.php");

class Semester extends DB{

  public function __construct(){
    parent::__construct();
    parent::setTableName("Semester");
  }

} 
