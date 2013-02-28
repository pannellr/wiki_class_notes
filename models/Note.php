<?php

require_once("DB.php");

class Note extends DB{

  public function __construct(){
    parent::__construct();
    parent::setTableName("notes");
  }

} 
