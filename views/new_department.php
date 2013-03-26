<h3>Create a Department</h3>

<form method="GET" action="create" >
  <p>
    <label for="institution_id">Choose Institution:</label><br />
    <select name="institution_id">
    <?php 
       foreach ($institutions as $institution) {
           echo "<option value=\"" 
	       . $institution['id']
	       . "\">"
	       . $institution['name']
	       . "</option>";
      }
    ?>

    </select>
  <p>
    <label for="name">Name</label><br />
    <input name="name" />
  </p>

 <p>
    <label for="shortname">Short Name</label><br />
    <input name="shortname" />
  </p>

  <input type="submit" value="Create" />
</form>
