<h1>Join a class</h1>

<form method="GET" action="create">
   
   <p>
     <select name="section_id">

<?php
   
   if (!empty($data)){
     foreach ($data as $class){
       echo "<option"
       .  " value=\"" 
       . $class['section_id']
       .  "\">"
       . $class['name'] . " " . $class['number'] . "-" . $class['section_number'] 
       . "</option>";
     }
   }

?>

     </select>
   </p>

   <input type="submit" value="Join" />

</form>