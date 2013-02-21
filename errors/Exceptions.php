<?

//One place for all of the exceptions classes


//exception for db connection error
class CouldNotEstablishConnectionException extends Exception{
  
  public function __construct($message, $code = 0) { 
    parent::__construct($message, $code); 
  }    
  
  public function __toString() { 
    return "<b style='color:red'>".$this->message."</b>"; 
  } 
}

//exception for failed insert
class CouldNotInsertRecordExeption extends Exception{

  public function __construct($message, $code = 0) { 
    parent::__construct($message, $code); 
  }    
  
  public function __toString() { 
    return "<b style='color:red'>".$this->message."</b>"; 
  }

}

//exception for trying to insert an exact copy of a column
//with a unique key
class UniqueKeyViolationExeption extends Exception{

  public function __construct($message, $code = 0) { 
    parent::__construct($message, $code); 
  }    
  
  public function __toString() { 
    return "<b style='color:red'>".$this->message."</b>"; 
  }

}

//If the a database update fails
class CouldNotUpdateExeption extends Exception{

  public function __construct($message, $code = 0) { 
    parent::__construct($message, $code); 
  }    
  
  public function __toString() { 
    return "<b style='color:red'>".$this->message."</b>"; 
  }

}

//if a db select statement fails
class CouldNotFetchQueryExeption extends Exception{

  public function __construct($message, $code = 0) { 
    parent::__construct($message, $code); 
  }    
  
  public function __toString() { 
    return "<b style='color:red'>".$this->message."</b>"; 
  }

}

