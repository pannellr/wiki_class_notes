<?php

require_once("DB.php");

class Institution extends DB{

  public function __construct(){
    parent::__construct();
    parent::setTableName("textbooks");
  }

} 
