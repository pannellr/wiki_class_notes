<?php

public class Flash(){
  //instance variables
  private $type;
  private $message;
    
    function __construct($message, $type){
    $this->message = $message;
    $this->$type = $type;
  }
  
  public function display(){
    echo "<div class=\"flash ".$this->type."\">".$this->message."</div>";
  }
  
  
}