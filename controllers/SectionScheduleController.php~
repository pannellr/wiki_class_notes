<?php

require_once("Controller.php");

class SectionScheduleController extends Controller implements ControllerInterface{

  //Call the parent class constructor
  function __construct($method, $data){
    parent::__construct($method, $data);
  }

  public function fresh(){
    $this->loadPage($user = null, "new_section_schedule");
  }

  public function create($params){
    $this->model = new SectionSchedule();
    $insert_id = $this->model->insert($params);
    $this->redirect("section_schedule/all");
  }

  public function show($id){
    $this->model = new SectionSchedule();
    $sectionSchedule = $this->model->select($id);
    $this->loadPage($user = null, "show_section_schedule", $sectionSchedule);
  }

  public function all(){
    $this->model = new SectionSchedule();
    $all = $this->model->select();
    $this->loadPage($user = null, "all_section_schedules", $all);
  }

  public function edit($id){
    $this->model = new SectionSchedule();
    $sectionSchedule = $this->model->select($id);
    $this->loadPage($user = null, "edit_section_schedule", $sectionSchedule);
  }

  public function update($updates){
    $this->model = new SectionSchedule();
    $this->model->update($updates);
    $this->redirect("section_schedule/show?id=" . $updates['id']);
  }

  public function destroy($id){
    $this->model = new SectionSchedule();
    $this->model->delete($id);
    $this->redirect("section_schedule/all");
  }
  
}