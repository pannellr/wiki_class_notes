<h3>Showing all Schools</h3>

<?php

foreach ($data as $school){
  echo "<p><h3>" 
    . $school['name'] 
    . "</h3> <a href=\"destroy?id=" 
    . $school['id'] 
    . "\">Delete</a></p>";
}


?>