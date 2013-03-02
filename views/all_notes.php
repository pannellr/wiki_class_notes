<h3>Showing all Notes</h3>

<?php

foreach ($data as $note){
  echo "<h3>" . $note['title'] . "</h3>";
  echo "<p><a href=\"destroy?id=" . $note['id'] . "\">Delete</a></p>"
    . "<a href=\"edit?id=" . $note['id'] . "\">Edit</a>";
}


?>