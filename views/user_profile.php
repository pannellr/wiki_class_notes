<?php if(!empty($data['user'])) { ?>

	<h2>Welcome <?php echo $data['user']['user_name']; ?></h2>

	<?php 
	if(!empty($data['courses'])) {
		require_once("student_classes.php");
	} else { ?>
	  <a href="
	  <?php
	    $link  = $link_prefix . "/student/add_course?person_id=";
	    $link .= $data['person_id'];
	    
	    echo $link;
	  ?>
	  ">Join a course</a>
	  <a href="
	  <?php
	    $link  = $link_prefix . "/course/fresh";
	    echo $link;
	   ?>
	   ">Create a course</a>
	<?php
	}
	?>
	
<?php } ?>
