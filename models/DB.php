<?php

require("../config/db.php");

class DB{

  public $dbh;
  private $tableName;

  function __construct(){
    $this->dbh = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);    
  }

  function select($where = false){

    $query="SELECT * FROM ". $this->tableName ;
    $separator=" WHERE ";
    foreach($where as $key=>$value){
	$query .= $separator . $key . "='" . $value . "'";
	$separator = " AND ";
    }
    $query .= ";";
    return $this->dbh->query($query);
    
  }
  
  function insert($values){
    
    $query = "insert into " . $this->tableName . " (";
    $separator = "";
    
    foreach ($values as $key => $value){
      $query .= $separator . "'" . $value . "'";
      $separator = ", ";
    }
    
    $query .= ") values (";
    $separator = "";
    
    foreach ($values as $key => $value){
      $query .= $separator . "'" . $value . "'";
      $separator = ", ";
    }
    
    $query .= ");";
    
    return $this->db->query($query);
    
  }
  

  function update($id, $values = false){
    $query = " UPDATE " . $this->tableName;
    $separater = " WHERE ";
	foreach ( $where as $key => $value){
	  $query .= $separator . "'" . $value . "'";
	  $separator = ", ";
	}
	
	$query .= ");";
	
	return $this->db->query($query);
	
  }
  
  function delete($where){
	$query = "DELETE FROM " . $this->tableName;
	$separater = " WHERE ";
	
	foreach ($where as $key => $value){
	$query .= $separater . $key . "='" . $value . "'";
	$separater = " AND ";
	}
	
	$query .= ";";
	return $this->dbh->query($query); 
  }

  function setTableName($t){
    $this->tableName = $t;
  }

}
