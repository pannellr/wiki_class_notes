<?php

if( !empty($data['course']) ){ ?>
  <h3>
    <?php
      echo $data['course']['shortname']
      .$data['course']['number']
      ." - "
      .$data['course']['name']
      ." - "
      .$data['course']['section_number']
      ;
    ?>
  </h3>
   <h4>Notes</h4>
   
   <?php
     foreach ($data['dates']as $key => $note_date) {
       ?>
       <h4><?php echo $note_date['date']; ?></h4>
       <ul>
       	<?php 
       	foreach ($note_date['notes'] as $note_num => $note_info) {
       		echo "<li>"
       		.$note_info['user_name']
       		."<ul>"
       		."<li>"
       		.$note_info['title']
       		."</li>"
       		."<li>"
       		.$note_info['summary']
       		."</li>"
       		."</ul>"
       		."</li>"
       		;
       	}
       	?>
       </ul>
       <?php
     }
   ?>

<?php 
} else {
?>
	
  <p>invalid course id</p>

<?php 
} 
?>

