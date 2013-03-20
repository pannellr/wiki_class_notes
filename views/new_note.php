<h3>Create a new Note</h3>

<form method="GET" action="create" >


   <?php if (!empty($data['courses'])){ ?>

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
  </p>

   <?php } else {

   echo "<h3>New note for " 
     . $data['section']['name'] 
     . "</h3>";

   echo "<input type=\"hidden\" name=\"section_id\" value=\"" 
     .  $data['section']['section_id']
     .  "\">";
 }
?>

  <p>
    <label for="date">Choose class date</label><br />
    <input name="date" type="date">
  </p>
  <p>
    <label for="title">Note Title</label><br />
    <input name="title" />
  </p>
  <p>
    <label for="summary">Note Summary</label><br />
    <input name="summary" cols="80">
  </p>
  <p>

  <textarea class="ckeditor" name="content"></textarea>
    
  </p>
  <input type="submit" value="Create" />
</form>
