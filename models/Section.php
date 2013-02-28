<?php

require_once("DB.php");

class Section extends DB{

  public function __construct(){
    parent::__construct();
    parent::setTableName("sections");
  }

} 
