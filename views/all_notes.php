<h3>Showing all Notes</h3>

<?php

foreach ($data as $note){
  echo "<h3>" . $note['title'] . " Date:" . $note['date'] . "</h3>";
  echo "<b>" . $note['summary'] . "</b>";
  echo "<p>" . $note['content'] . "</p>";
  echo "<p><a href=\"destroy?id=" . $note['id'] . "\">Delete</a></p>"
    . "<a href=\"edit?id=" . $note['id'] . "\">Edit</a>";
}


?>