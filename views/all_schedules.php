<h3>Showing all Schedules</h3>

<?php

foreach ($data as $schedule){
  echo "<h3>" . $schedule['monday'] . "</h3>";
  echo "<p><a href=\"destroy?id=" . $shedule['id'] . "\">Delete</a></p>"
    . "<a href=\"edit?id=" . $schedule['id'] . "\">Edit</a>";
}


?>