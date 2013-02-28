<h2>Showing all Departments</h2>

<?php

foreach ($data as $department){
  echo "<h3>" . $department['name'] . "</h3>";
  echo "<p><a href=\"destroy?id=" . $department['id'] . "\">Delete</a></p>"
    . "<a href=\"edit?id=" . $department['id'] . "\">Edit</a>";
}


?>