<h3>Create a Department</h3>

<form method="GET" action="create" >
  <p>
    <select name="institution_id">
    <?php 
       foreach ($data as $key => $value) {
           echo "<option value=\"" 
	       . $value['id']
	       . "\">"
	       . $value['name']
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
