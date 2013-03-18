<h1>Join a course</h1>

<form method="GET" action="create">

   <input type="hidden" name="person_id" value="<?php echo $_GET['person_id']; ?>">
   
   <p>
     <select name="section_id">

<?php
   
   if (!empty($data)){
     foreach ($data as $course){
       echo "<option"
       .  " value=\"" 
       . $course['section_id']
       .  "\">"
       . $course['name'] . " " . $course['number'] . "-" . $course['section_number'] 
       . "</option>";
     }
   }

?>

     </select>
   </p>

   <input type="submit" value="Join" />

</form>