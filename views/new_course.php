<h3>Create a new Course</h3>

<form method="GET" action="create" >
  <p>
    <select name="department_id">

      <?php
   
   foreach ($data as $department){
     echo "<option value=\"" 
         . $department['id'] 
         . "\">" 
         . $department['name'] 
         . "</option>";
   }
      ?>

    </select>
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
