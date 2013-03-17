<h3>Login</h3>

<form method="POST" action ="authenticate">

   <p>
     <label for="user_name">Username:</label><br />
     <input name="user_name">
  </p>

  <p>
     <label for="password">Password:</label><br />
     <input type="password" name="password" /><br />

  </p>

  <input type="submit" value="Submit">

</form>

<a href="#">forgot password</a>

<?php require_once "new_user.php" ?>