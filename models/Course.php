<?php

require_once("DB.php");

class Course extends DB{

  public function __construct(){
    parent::__construct();
    parent::setTableName("courses");
  }


  //returns all available courses as an array
  public function allWithSectionId(){

    $query =<<<SQL
      select * 
      from courses c
      join sections s
      on s.course_id = c.id;
SQL;

  return $this->query($query);

  }


  public function getCourseData($section_id){
    
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
    where se.id=$section_id;
SQL;

    $result = $this->query($query);

    return $result[0];

  }

  public function getCourseNoteDates($section_id){
      $query = <<<SQL
        select distinct date 
        from notes
        where section_id=$section_id;
SQL;

    $result = $this->query($query);
    return $result;
  }

  public function getNotesForDate($section_id, $date){
      $query = <<<SQL
        	select notes.id as note_id,
		title,
		summary,
		content,
		person_id, 
		users.id as user_id,
		user_name
	from notes
	join people
	  on created_by_person=people.id
	join users
	  on users.person_id=people.id
        	where section_id='$section_id'
        	and date='$date';
SQL;

    $result = $this->query($query);
    return $result;
  }
} 
