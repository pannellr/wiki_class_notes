<?php

require_once("Controller.php");

class NoteController extends Controller implements ControllerInterface{

  //Call the parent class constructor
  function __construct($method, $data){
    parent::__construct($method, $data);
  }

  //default for new note
  //will not accept any parameters
  //according to interface
  public function fresh(){
    $course = new Course();
    $courses = $course->select();
    $data['courses'] = $courses;
    $this->loadPage($this->user, "new_note", $data);
  }

  public function newNote($section_id){
    //get course info using $section_id
    $course = new Course;
    $section = $course->getCourseData($section_id['section_id']);
    $data['section'] = $section;
    $this->loadPage($this->user, "new_note", $data);
  }

  public function create($params){
    $this->model = new note();
    
    $u = new User;
    $person_id = $u->select(array('id' => $this->user['user_id']));
   
    $params['person_id'] = $person_id[0]['person_id'];
    $insert_id = $this->model->insert($params);
    $this->redirect("course/show?section_id=" . $params['section_id']);
  
  }

  public function show($id){
    $this->model = new note();
    $note = $this->model->select($id);
    $this->loadPage($this->user, "show_note", $note);
  }

  public function all(){
    $this->model = new note();
    $all = $this->model->select();
    $this->loadPage($this->user, "all_notes", $all);
  }

  public function edit($id){
    $this->model = new note();
    $note = $this->model->select($id);
    $this->loadPage($this->user, "edit_note", $note);
  }

  public function update($updates){
    $this->model = new note();
    $this->model->update($updates);
    $this->redirect("note/show?id=" . $updates['id']);
  }

  public function destroy($id){
    $this->model = new note();
    //get the data before you delete it(best practice for delete?
    $noteData = $this->model->select($id);

    $this->model->delete($id);
    $this->redirect("course/show?section_id=" . $noteData[0]['section_id']);
  }
  
}