 <div id="session_info">
    <?php

    if(!empty($data['user'])){ ?>
      You are logged in as <em><?php echo $data['user']['user_name'] ?></em>
      <a href="/user/me">profile</a>
      <a href="/user/logout">logout</a>
    <?php 
    } else { ?>
      You are not logged in.
      <a href="/user/login">login</a>
      <a href="/user/fresh">sign up</a>
    <?php 	} ?>

</div>