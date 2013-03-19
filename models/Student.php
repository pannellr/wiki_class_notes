<?php

require_once("DB.php");

class Student extends DB{

  public function __construct(){
    parent::__construct();
    parent::setTableName("students");
  }

  public function courses($user_id){
    $query =<<<SQL
select c.name
    ,  se.id as section_id
    ,  c.number
    ,  se.section_number
    ,  d.shortname
from students s
join people p
  on p.id = s.person_id
join sections se
  on se.id = s.section_id
join courses c
  on c.id = se.course_id
join departments d
  on d.id = c.department_id
join users u 
  on u.person_id = p.id
where u.id = $user_id;

SQL;

  return $this->query($query);

  }

}
