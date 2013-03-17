<!-- 
Creates a fresh user
Fields:
	username
	password
	confirm password
	first name
	last name
	date of birth
	email
	confirm email

Validations:
	username - min of 1 character, max of 10 characters
		screen against list of bad words
		alpha-numeric and underscore
	password - min 6 characters, max of 32
		one letter, one number, one non-alphanumeric character
		passwords must match
	first name - not blank, alpha, space, ['-] only
	Last name  - not blank, alpha, space, ['-] only
	Date of birth - selection from list
		between ages 6 and 120
		Validate for actual date
	Email - valid email with user, '@', domain, TLD
		emails must match

Database validations:
	username does not already exist
	email does not already exist
	PHP sanitization of input data

-->

<div id="signup">
	<p>New to wiki class notes?</p>
<h3>Sign Up</h3>

<form method="POST" action ="create">

   
  <p>
     <label for="first_name">First Name:</label>
     <input class="field" name="first_name" /><br />
  </p>

  <p>
     <label for="last_name">Last Name:</label>
     <input class="field" name="last_name" /><br />
  </p>

  <p>
    <label for="date_of_birth">Date of birth:</label>
    <input class="field" type="date" name="date_of_birth" /><br />
  </p>

  <p>
     <label for="email">Email:</label>
     <input class="field" name="email" /><br />
  </p>

    <p>
     <label for="confirm_email">Confirm Email:</label>
     <input class="field" name="confirm_email" /><br />
  </p>

<p>
     <label for="user_name">Username:</label>
     <input class="field" name="user_name" /><br />
  </p>

  <p>
     <label for="password">Password:</label>
     <input class="field" type="password" name="password" /><br /><br />
     <label for="confirm_password">Confirm Password:</label> 
     <input class="field"type="password" name="confirm_password" /><br />
  </p>

  <input class="submit" type="submit" value="Submit" />

</form>
</div>
<div>Already singed up?</div>
<?php require "login_user.php" ?>s