<?php

require_once("DB.php");

class Student extends DB{

  public function __construct(){
    parent::__construct();
    parent::setTableName("students");
  }

  public function courses($user_id){

    $query =<<<SQL
select * 
from students s
join people p
  on p.id = s.person_id
join sections se
  on se.id = s.section_id
join courses c
  on c.id = se.course_id
join users u 
  on u.person_id = p.id
where u.id = $user_id
SQL;

    $classes = $this->query($query);
    return $classes;

  }

  public function availableCourses(){
    
    $query =<<<SQL
      select c.name
      , c.number
      , s.id as section_id
      , s.section_number
from courses c
join sections s
  on s.course_id = c.id;
SQL;

    $classes = $this->query($query);
    return $classes;
  }
} 
