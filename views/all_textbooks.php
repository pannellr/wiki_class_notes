<h2>Showing all textbooks</h2>

<?php

foreach ($data as $textbook){
  echo "<h3>" . $textbook['name'] . "</h3>";
    echo "<h3>" . $textbook['author'] . "</h3>";
  echo "<p><a href=\"destroy?id=" . $textbook['id'] . "\">Delete</a></p>"
    . "<a href=\"edit?id=" . $textbook['id'] . "\">Edit</a>";
}


?>