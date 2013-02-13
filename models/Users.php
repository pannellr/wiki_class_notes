<?php 
	require("../config/db.php");
	class Users inherits DB{
		//Instance variables
		private $tableName;

		//Constructor
		function __construct(){
			//Initializes private variable
			//Tells database to work in 'Users' table
			$this->$tableName = 'Users';
		}

		//Methods
	}
?>