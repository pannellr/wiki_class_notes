<h3>Showing all Semesters</h3>

<?php

foreach ($data as $semester){
  echo "<h3>" . $semester['title'] . "</h3>";
  echo "<p><a href=\"destroy?id=" . $semester['id'] . "\">Delete</a></p>"
    . "<a href=\"edit?id=" . $semester['id'] . "\">Edit</a>";
}


?>