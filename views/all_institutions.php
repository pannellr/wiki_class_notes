<h3>Showing all Schools</h3>

<?php

foreach ($data as $school){
  echo "<h3>" . $school['name'] . "</h3>";
  echo "<p><a href=\"destroy?id=" . $school['id'] . "\">Delete</a></p>"
    . "<a href=\"edit?id=" . $school['id'] . "\">Edit</a>";
}


?>