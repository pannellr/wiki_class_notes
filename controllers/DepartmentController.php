<?php

require_once("Controller.php");

class DepartmentController extends Controller implements ControllerInterface{

  //Call the parent class constructor
  function __construct($method, $data){
    parent::__construct($method, $data);
  }

  public function fresh(){
    $ints = new Institution();
    $institutions = $ints->select();
    $this->loadPage($user = null, "new_department", $institutions);
  }

  public function create($params){
    $this->model = new Department();
    $insert_id = $this->model->insert($params);
    $this->redirect("department/all");
  }

  public function show($id){
    $this->model = new Department();
    $department = $this->model->select($id);
    $this->loadPage($user = null, "show_department", $department);
  }

  public function all(){
    $this->model = new Department();
    $all = $this->model->select();
    $this->loadPage($user = null, "all_departments", $all);
  }

  public function edit($id){
    $this->model = new Department();
    $department = $this->model->select($id);
    $this->loadPage($user = null, "edit_institution", $department);
  }

  public function update($updates){
    $this->model = new Department();
    $this->model->update($updates);
    $this->redirect("department/show?id=" . $updates['id']);
  }

  public function destroy($id){
    $this->model = new Department;
    $this->model->delete($id);
    $this->redirect("department/all");
  }
  
}