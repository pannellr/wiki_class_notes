<?php

require_once("DB.php");

class People extends DB{

  public function __construct(){
    parent::__construct();
    parent::setTableName("people");
  }

} 