<?php
require("DB.php");

class Test extends DB{

  function __construct(){
    parent::setTableName("tests");
  }

}
