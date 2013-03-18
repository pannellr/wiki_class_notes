<pre>
<?php print_r($data) ?>
</pre>
<?php if(!empty($data['user'])) { ?>

	<h2>Welcome <?php echo $data['user']['user_name']; ?></h2>

	<h3>Your Courses</h3>
		<?php if(!empty($data['courses'])) { ?>
		<ul id="course-list" class="courses">
			<?php 
				foreach ($data['course'] as $key => $value) { ?>
				<li><?php echo $key; ?></li>
			<?php } ?>
		</ul>
		<?php } else { ?>
			<p>You are not subscribed to any courses.</p>
		<?php } ?>
	<a href="/student/add_class?person_id=<?php echo $data['user_info']['person_id'] ?>">Join a course</a>
	<a href="/course/fresh">Create a course</a>
<?php } ?>
