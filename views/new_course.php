<h3>Create a new Course</h3>

<form method="GET" action="create" >
  <p>
    <label for="department_id">Choose a Department:</label><br />
    <select name="department_id">

      <?php
    
   foreach ($departments as $department){
     echo "<option value=\"" 
         . $department['id'] 
         . "\">" 
         . $department['name'] 
         . "</option>";
   }
      ?>

    </select>
    <br />
    <a href="<?php echo $link_prefix; ?>/department/fresh">Create a department</a>
  <p>
    <label for="name">Course Name</label><br />
    <input name="name" />
  </p>
  <p>
    <label for="number">Course Number</label><br />
    <input name="number">
  </p>
  <input type="submit" value="Create" />
</form>
