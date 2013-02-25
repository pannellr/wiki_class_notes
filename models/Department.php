<?php

require_once("DB.php");

class Department extends DB{

  public function __construct(){
    parent::__construct();
    parent::setTableName("departments");
  }

} 
