<?php

  //require_once("../config/db.php");

class DB{

  public $dbh;
  private $tableName;

  function __construct(){
    $this->dbh = new mysqli('db.cs.dal.ca', 'sdugas', 'B00582339', 'sdugas_esarve'); 
    if ($this->dbh->connect_errno) {
	echo "Failed to connect to MySQL: " . $this->dbh->connect_error;
    }
  }

  function select($where = false){
    $query="SELECT * FROM ". $this->tableName ;
    $separator=" WHERE ";
    if ($where){
      foreach ( $where as $key=>$value){
	$query .= $separator . $key . "='" . $value . "'";
	$separator = " AND ";
      }
    }
    $query .= ";";
    $results = array();
    $res = $this->dbh->query($query);

    while ($row = $res->fetch_assoc()){
      array_push($results, $row);
    }

    return $results;

  }
  
  function insert($values){
    $query = "insert into " . $this->tableName . " (";
    $separator = "";
    
    foreach ($values as $key => $value){
      $query .= $separator . "`" . $key . "`";
      $separator = ", ";
    }
    
    $query .= ") values (";
    $separator = "";
    
    foreach ($values as $key => $value){
      $query .= $separator . "'" . $value . "'";
      $separator = ", ";
    }
    
    $query .= ");";

    return $this->dbh->query($query);
    
  }
  

  function update($id, $values = false){
    $query = " UPDATE " . $this->tableName;
    $separater = " SET ";
	foreach ( $where as $key => $value){
	  $query .= $separator . $key . "= '" . $value . "'";
	  $separator = ", ";
	}
	$query .= " where id = $id ";
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
