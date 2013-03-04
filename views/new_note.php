<h3>Create a new Note</h3>

<form method="GET" action="create" >
  <p>
    <label for="course_id">Choose a Course:</label><br />
    <select name="course_id">

      <?php
   
   foreach ($data as $course){
     echo "<option value=\"" 
         . $course['id'] 
         . "\">" 
         . $course['name'] 
         . "</option>";
   }
      ?>

    </select>
  <p>
    <label for="title">Note Title</label><br />
    <input name="title" />
  </p>
  <p>
    <label for="summary">Note Summary</label><br />
    <input name="summary">
  </p>
  <p>
    <label for="content">Note Content</label><br />
    <input name="content">
  </p>
  <input type="submit" value="Create" />
</form>