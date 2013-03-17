<h1>Showing all Classes</h1>
<?php

echo "<a href=\"/student/add_class\">Join a class</a>";
echo "<br />";

if (!empty($data)){
  foreach ($data as $class){
    echo "<a class=\"class_link\" href=\"class/show?id=" 
      . $class['id']
      . "\">"
      . $class['name']
      . "</a>";
    echo "<br />";
      }
}

?>