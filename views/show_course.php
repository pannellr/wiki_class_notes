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
  <a href="<?php echo $data['link_prefix']; ?>/note/newNote?section_id=<?php echo $data['course']['section_id']; ?>">New Note</a>
   
  <h4>Notes</h4>
   
   <?php
     foreach ($data['dates']as $key => $note_date) {
       ?>
       <h4><?php echo $note_date['date']; ?></h4>
       <ul>
       	<?php 
       	foreach ($note_date['notes'] as $note_num => $note_info) {
       		echo "<li>"
              . $note_info['user_name']
              . "<ul>"
              . "<li>"
              . "<a href=\"" . $data['link_prefix'] . "/note/show?id="
              . $note_info['note_id']
              . "\">"
              . $note_info['title']
              . "</a>"
              . "</li>"
              . "<li>"
              . $note_info['summary']
              . "</li>";
	      
	      if($note_info['user_id'] == $user['user_id']){
		  echo "<li>
                <a href=\"" . $data['link_prefix'] . "/note/edit?id="
                  . $note_info['note_id']
                  . "\">"
                  ."edit"
                ."</a>"
                ."</li>";
                echo "<li>
                <a href=\"" . $data['link_prefix'] . "/note/destroy?id="
                  . $note_info['note_id']
                  . "\">"
                  ."delete"
                ."</a>"
                ."</li>";
	      }
		
              echo "</ul>"
              . "</li>";
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

