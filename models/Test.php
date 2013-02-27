<?php
require("DB.php");

class Test extends DB{

  public function __construct(){
    parent::__construct();
    parent::setTableName("tests");
  }

}
