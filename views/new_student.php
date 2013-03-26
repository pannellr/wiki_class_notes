<h1>Join a course</h1>


<form method="get" action="create" >
    <p>
        <select name="section_id">

<?php

foreach ($data['courses'] as $course){
  echo "<option value="
    .  $course['section_id']
    . "\">"
    . $course['name']
    . "</option>";
 }

?>

        </select><br />
	<a href="<?php echo $data['link_prefix']; ?>/course/fresh">Create a new course</a>
    </p>
    <input type="submit" value="Join">

</form>