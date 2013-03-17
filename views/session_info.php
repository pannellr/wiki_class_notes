 <div id="session_info">
    <?php

    print_r($data['user']);

    if(!empty($data['user'])){ ?>
      You are logged in as <em><?php echo $data['user']['user_name'] ?></em>
      <a href="/user/logout">Logout</a>
    <?php 
    } else { ?>
      You are not logged in.
      <a href="/user/login">login</a>
      <a href="/user/fresh">sign up</a>
    <?php 	} ?>

</div>