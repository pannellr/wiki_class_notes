 <div id="session_info">
    <?php
    if(isset($data['user'])){ ?>
      You are logged in as <em><?php echo $data['user']['user_name'] ?></em>
    <?php 
    } else { ?>
      You are not logged in.
      <a href="/wiki_class_notes/user/login">login</a>
      <a href="/wiki_class_notes/user/fresh">sign up</a>
    <?php 	} ?>

</div>