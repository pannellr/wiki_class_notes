<?php if (!empty($data['courses'])){ ?>

  <h3>Your courses</h3>
  <ul id="course-list" class="courses">

  <?php

  foreach ($courses as $course){
    echo "<li>";
    echo "<a class=\"class_link\" href=\"" 
    . $link_prefix 
    . "/course/show?section_id="
    . $course['section_id']
    . "\">"
    . $course['shortname']
    . $course['number']
    . " - "
    . $course['name']
    . " - "
    . $course['section_number']
    . "</a>";
    
    echo " | <a href=\"" 
    . $link_prefix 
    . "/student/destroy?section_id=" 
    . $course['section_id'] 
    .  "\">Remove</a>";

    echo "</li>";
   }
     ?>

  </ul>

<?php 
  } else {  
  echo "<h3>You have not joined any courses</h3>";
}
?>
<a href="<?php echo $link_prefix; ?>/student/fresh?person_id=<?php echo $data['person_id']; ?>">Join a course</a>
<a href="<?php echo $link_prefix; ?>/course/fresh">Create a course</a>