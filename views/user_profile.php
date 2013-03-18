<pre>
<?php print_r($data) ?>
</pre>
<?php if(!empty($data['user'])) { ?>

	<h2>Welcome <?php echo $data['user']['user_name']; ?></h2>

	<?php require_once("student_classes.php"); ?>
	
<?php } ?>
