<?php

require_once("DB.php");

class Student extends DB{

  public function __construct(){
    parent::__construct();
    parent::setTableName("students");
  }

  public function courses($user_id){

    $query =<<<SQL
select c.id as id,
    se.id as section_id, 
    d.shortname,
    c.number,
    c.name,
    se.section_number 
from students s
join people p
  on p.id = s.person_id
join sections se
  on se.id = s.section_id
join courses c
  on c.id = se.course_id
join users u 
  on u.person_id = p.id
join departments d
  on d.id=c.department_id
where u.id = $user_id;
SQL;


    $classes = $this->query($query);
    return $classes;

  }

  public function availableCourses(){
    
//     $query =<<<SQL
//  select c.id as course_id,
//     se.id as section_id, 
//     d.shortname,
//     c.number,
//     c.name,
//     se.section_number 
// from sections se
// join courses c
//   on c.id = se.course_id
// join departments d
//   on d.id=c.department_id;
// SQL;

    //wont show courses that the student is already in
$query = <<<SQL
    select c.id as course_id,
    se.id as section_id, 
    d.shortname,
    c.number,
    c.name,
    se.section_number 
from sections se
join courses c
  on c.id = se.course_id
join departments d
  on d.id=c.department_id
WHERE course_id NOT IN(
select c.id as course_id
from students s
join people p
  on p.id = s.person_id
join sections se
  on se.id = s.section_id
join courses c
  on c.id = se.course_id
join users u 
  on u.person_id = p.id
join departments d
  on d.id=c.department_id
where u.id = 39
);
SQL;

    $classes = $this->query($query);
    return $classes;
  }
} 
