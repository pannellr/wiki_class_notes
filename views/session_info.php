 <div id="session_info">
    <?php

    if(!empty($data['user'])){ ?>
      You are logged in as <em><?php echo $data['user']['user_name'] ?></em>
      <a href="<?php echo $data['link_prefix']; ?>/user/me">profile</a>
      <a href="<?php echo $data['link_prefix']; ?>/user/logout">logout</a>
    <?php 
    } else { ?>
      You are not logged in.
      <a href="<?php echo $data['link_prefix']; ?>/user/login">login</a>
      <a href="<?php echo $data['link_prefix']; ?>/user/fresh">sign up</a>
    <?php 	} ?>

</div>