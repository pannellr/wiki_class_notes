<?php

require_once("Controller.php");

class TextbookController extends Controller implements ControllerInterface{

  //Call the parent class constructor
  function __construct($method, $data){
    parent::__construct($method, $data);
  }

  public function fresh(){
    $this->loadPage($this->user, "new_textbook");
  }

  public function create($params){
    $this->model = new Textbook();
    $insert_id = $this->model->insert($params);
    $this->redirect("textbook/all");
  }

  public function show($id){
    $this->model = new Textbook();
    $textbook = $this->model->select($id);
    $this->loadPage($this->user, "show_textbook", $textbook);
  }

  public function all(){
    $this->model = new Textbook();
    $all = $this->model->select();
    $this->loadPage($this->user, "all_textbooks", $all);
  }

  public function edit($id){
    $this->model = new Textbook();
    $textbook = $this->model->select($id);
    $this->loadPage($this->user, "edit_textbook", $textbook);
  }

  public function update($updates){
    $this->model = new Textbook();
    $this->model->update($updates);
    $this->redirect("textbook/show?id=" . $updates['id']);
  }

  public function destroy($id){
    $this->model = new Textbook();
    $this->model->delete($id);
    $this->redirect("textbook/all");
  }
  
}
