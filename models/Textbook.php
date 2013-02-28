<?php

require_once("DB.php");

class Textbook extends DB{

  public function __construct(){
    parent::__construct();
    parent::setTableName("textbooks");
  }

} 
