<?php

//require_once("../config/db.php");
require_once("../errors/Exceptions.php");

class DB{
  
  public $dbh;
  private $tableName;
  
  function __construct(){
     $this->dbh = new mysqli('localhost', 'root', 'root', 'sdugas_esarve');
    if (mysqli_connect_errno($this->dbh)) {
	throw new CouldNotEstablishConnectionException("Could not connect to Database");
    }
   
  }
  
  //selects everything within where parameter and then put them in an array
  //@param where
  //@return array of results
  function select($where = false){
    $query="SELECT * FROM ". $this->tableName ;
    $separator=" WHERE ";
    if ($where){
      foreach ( $where as $key => $value){
	$query .= $separator . $key . " = '" . $value . "'";
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
  
  // inserts the values into the table
  //@param values
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

    $this->dbh->query($query);  
    return $this->dbh->insert_id;
  
  }
  
  //update the values associated with the id
  //@ param id
  //@ param values the values is being chaged
  function update($values){

    $id = $values['id'];
    unset($values['id']);
    $query = " UPDATE " . $this->tableName;
    $separator = " SET ";

    foreach ($values as $key => $value){
      $query .= $separator . $key . " = '" . $value . "'";
      $separator = ", ";

    }
    $query .= " where id = $id ";
    $query .= ";";
    return $this->dbh->query($query);
    
  }

  // delete the record
  //@ param id
  function delete($id){
    $query = "DELETE FROM " . $this->tableName;
    $separater = " WHERE ";
    $query .= " where id = " . $id['id'];
    
    $query .= ";";
    return $this->dbh->query($query); 
  }
  
  function setTableName($t){
    $this->tableName = $t;
  }

 function query($q)
 {
	$results = array();
    $res = $this->dbh->query($q);
    while ($row = $res->fetch_assoc()){
      array_push($results, $row);
    }
    return $results;
 }
}
