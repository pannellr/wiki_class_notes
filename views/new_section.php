<?php extract($data); ?>

<h3>Create a new Course Section</h3>

<form method="GET" action="create" >
  <p>
   <label for="number">Section Number(Different than course number)</label><br />
    <input name="name" />
  </p>

  <p>
     <label for="section_schedule_id">Choose a Schedule:</label><br />
     <select name="section_schedule_id">
   <?php
   foreach ($schedules as $schedule){
       echo "<option value="
       . $schedule['id']
       . "\">"
       . $schedule['monday']
       . "</option>";
     }
       ?>
     </select>
  </p>
  <p>
     <label for="text_id">Choose a Textbook:</label><br />
     <select name="text_id">
       <?php
   foreach ($texbooks as $textbook){
     echo "<option value="
     . $textbook['id']
     . "\">"
     . $textbook['title']
     . "</option>";
   }
   ?>
      </select>
  </p>
  <p>
     <label for="semester_id">Choose a Semester:</label><br />
     <select name="semester_id">
  <?php
   foreach ($semesters as $semester){
       echo "<option value="
       . $semester['id']
       . "\">"
       . $semester['title']
       . "</option>";
     }
       ?>     


     </select>
  </p>  
  <input type="submit" value="Create" />
</form>