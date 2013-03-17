 <div id="session_info">
    <?php
    if(isset($user)){ ?>
      You are logged in as <em><?php echo $user['user_name'] ?></em>
      <a href="logout">Logout</a>
    <?php 
    } else { ?>
      You are not logged in.
      <a href="/user/login">login</a>
      <a href="/user/fresh">sign up</a>
    <?php 	} ?>

</div>