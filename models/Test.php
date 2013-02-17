<?php
require("DB.php");

class Test extends DB{

  public $tableName = "test";
  
  function __construct(){
    parent::setTableName($this->tableName);
  }

  function testShow(){
    $this->delete( array("id" => 3) );
    //require("../views/test_show.php");
  }


}