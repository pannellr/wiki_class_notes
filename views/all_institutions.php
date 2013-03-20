<h3>Showing all Schools</h3>

<?php

if ($data['schools']){

  foreach ($data['schools'] as $school){
    echo "<h3>" . $school['name'] . "</h3>";
    echo "<p><a href=\"/institution/destroy?id=" 
      . $school['id'] 
      . "\">Delete</a></p>";
    
    echo "<a href=\"/institution/edit?id=" 
      . $school['id'] 
      . "\">Edit</a>";
  }
}

?>