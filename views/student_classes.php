<pre>
<?php print_r($data); ?>
</pre>
<h1>Showing all Courses</h1>
 <?php

echo "<a href=\"/student/add_class?person_id=" 
    . $data['person_id'] 
    . "\">Join a class</a>";

echo "<br />";

if (!empty($data['courses'])){
  foreach ($data['courses'] as $class){
    echo "<a class=\"class_link\" href=\"class/show?id=" 
      . $class['id']
      . "\">"
      . $class['name']
      . "</a>";
    echo "<br />";
      }
}

?>