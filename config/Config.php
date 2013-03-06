<?php

class Config{
	
	private $host;
	private $username;
	private $password;
	private $DBname;
	
	function __construct(){
	 $this->host="localhost";
	 $this->username="root";
	 $this->password="root";
	 $this->DBname="sdugas_esarve";
	}
	
	function getHost(){
	return $this->host;
	}
	
	function getUsername(){
	return $this->username;
	}
	
	function getPassword(){
	return $this->password;
	}
	
	function getDBname(){
	return $this->DBname;
	}
	
	}
	