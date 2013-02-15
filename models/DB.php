<?php

require("../config/db.php");

class DB{

  public $dbh;
  private $tableName;

  function __construct(){
    
    // we connect to example.com and port 3307
    $con = mysql_connect($dbHost, $dbUser, $dbPassword);
    if (!$con) {
      die('Could not connect: ' . mysql_error());
    }
    
    mysql_select_db($dbName, $con);

    $this->dbh = $con;

  }

  function select($id, $where = false){

  }

  function insert($values){

  }

  function update($id, $values = false){
  }

  function delete($id){
  }

  function query($q){
  }

}
