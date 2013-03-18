<h3>Your courses</h3>
 <?php

if (!empty($data['courses'])){ ?>
  <ul id="course-list" class="courses">
  <?php
  foreach ($data['courses'] as $class){
    echo "<li>";
    echo "<a class=\"class_link\" href=\"class/show?id=" 
      . $class['id']
      . "\">"
      . $class['shortname']
      . $class['number']
      . " - "
      . $class['name']
      . " - "
      . $class['section_number']
      . "</a>";
    echo "</li>";
      }
    ?>
  </ul>

<?php 
}
?>
<a href="/student/add_course?person_id=<?php echo $data['person_id']; ?>">Join a course</a>
<a href="/course/fresh">Create a course</a>