<?php

require_once("DB.php");

class Student extends DB{

  public function __construct(){
    parent::__construct();
    parent::setTableName("students");
  }

  public function classes($user_id){

    $query =<<<SQL

select * 
from students s
join people p
  on p.id = s.person_id
join courses c
  on c.id = s.course_id
join users u 
  on u.person_id = p.id
where u.id = $id

SQL;

    $classes = $this->query($query);
    return $classes;

  }

} 
