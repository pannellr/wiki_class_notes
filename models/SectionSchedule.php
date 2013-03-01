<?php

require_once("DB.php");

class SectionSchedule extends DB{

  public function __construct(){
    parent::__construct();
    parent::setTableName("section_schedules");
  }

} 
