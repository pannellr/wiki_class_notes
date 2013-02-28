 <div id="session_info">
 	<?php
 		if(isset($user)){ ?>
 			You are logged in as <em><?php echo $user['user_name'] ?></em>
 	<?php 
 		} else {
 			echo "You are not logged in.";
 			echo ""
 		}

 </div>