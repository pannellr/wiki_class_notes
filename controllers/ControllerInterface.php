<?php

interface ControllerInterface{

  //enforcing the CRUD -- create, read, update, delete
  public function show($id);
  public function all();
  public function edit($id);
  public function update($updates);
  public function destroy($id);
  public function create($params);
  //capitalize New so we don't make conflict with new keyword
  public function New();

}