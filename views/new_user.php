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
	username - min of 1 character, max of 15 characters
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
	Email - valide email with user, '@', domain, TLD
		emails must match
-->