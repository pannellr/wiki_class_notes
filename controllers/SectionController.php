<?php

require_once("Controller.php");

class SectionController extends Controller implements ControllerInterface{

  //Call the parent class constructor
  function __construct($method, $data){
    parent::__construct($method, $data);
  }

  public function fresh(){
    $this->loadPage($user = null, "new_section");
  }

  public function create($params){
    $this->model = new Section();
    $insert_id = $this->model->insert($params);
    $this->redirect("wiki_class_notes/section/all");
  }

  public function show($id){
    $this->model = new Section();
    $section = $this->model->select($id);
    $this->loadPage($user = null, "show_section", $section);
  }

  public function all(){
    $this->model = new Section();
    $all = $this->model->select();
    $this->loadPage($user = null, "all_sectionss", $all);
  }

  public function edit($id){
    $this->model = new Section();
    $section = $this->model->select($id);
    $this->loadPage($user = null, "edit_section", $section);
  }

  public function update($updates){
    $this->model = new Section();
    $this->model->update($updates);
    $this->redirect("wiki_class_notes/section/show?id=" . $updates['id']);
  }

  public function destroy($id){
    $this->model = new Section();
    $this->model->delete($id);
    $this->redirect("wiki_class_notes/Section/all");
  }
  
}