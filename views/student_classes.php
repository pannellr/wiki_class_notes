<h3>Your courses</h3>
 <?php

if (!empty($data['courses'])){ ?>
  <ul id="course-list" class="courses">
  <?php
  foreach ($data['courses'] as $course){
    echo "<li>";
<<<<<<< HEAD
    echo "<a class=\"class_link\" href=\"/course/show?id=" 
      . $class['id']
      ."&section="
      .$class['section_id']
      . "\">"
      . $class['shortname']
      . $class['number']
      . " - "
      . $class['name']
      . " - "
      . $class['section_number']
=======
    echo "<a class=\"course_link\" href=\"/course/show?id=" 
      . $course['id']
      . "\">"
      . $course['shortname']
      . $course['number']
      . " - "
      . $course['name']
      . " - "
      . $course['section_number']
>>>>>>> 83ef2d06a732e8a1ace34c8a44262d436c91c7a0
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