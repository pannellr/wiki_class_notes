<h3>Your courses</h3>
 <?php

if (!empty($data['courses'])){ ?>
  <ul id="course-list" class="courses">
  <?php
  foreach ($data['courses'] as $course){
    echo "<li>";
    echo "<a class=\"class_link\" href=\"" . $link_prefix . "/course/show?section_id="
      . $course['section_id']
      . "\">"
      . $course['shortname']
      . $course['number']
      . " - "
      . $course['name']
      . " - "
      . $course['section_number']
      . "</a>";
    echo "</li>";
      }
    ?>
  </ul>

<?php 
}
?>
<a href="<?php echo $link_prefix; ?>/student/fresh?person_id=<?php echo $data['person_id']; ?>">Join a course</a>
<a href="<?php echo $link_prefix; ?>/course/fresh">Create a course</a>