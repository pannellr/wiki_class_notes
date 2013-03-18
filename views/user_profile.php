<pre>
<?php print_r($data) ?>
</pre>
<?php if(!empty($data['user'])) { ?>

	<h2>Welcome <?php echo $data['user']['user_name']; ?></h2>

	<?php 
	if(!empty($data['courses'])) {
		require_once("student_classes.php");
	} else { ?>
		<a href="/student/add_course?person_id=<?php echo $data['person_id']; ?>">Join a course</a>
		<a href="/course/fresh">Create a course</a>
	<?php
	}
	?>
	
<?php } ?>
