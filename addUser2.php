<html>
	<head>
		<title>Enter your information</title>
	</head>
	<body>
<?php

			//include 'register.php';
			include 'db_connect.php';
			

			echo "<form method='post' action='register.php'>";
				echo "<fieldset>";
					//Get user ID
					echo "<p>Enter your UMW NetID:</p>";
					echo "<p><input type='text' name='login' id='login' size='15'/></p>";
					//Get password
					echo "<p>Enter a password:</p>";
					echo "<p><input type='password' name='password1' id='password1' size='15'/></p>";
					//Get password again
					echo "<p>Re-enter your password:</p>";
					echo "<p><input type='password' name='password2' id='password2' size='15'/></p>";
					echo "<p><input type='submit' id='register_button' value='Register'/></p>";
				echo "</fieldset>";
			echo "</form>";
			//Handle funky errors from register.php (noName, noPass, nameUsed, passMismatch)
			if($_GET['error'] == 'noName')
			{
  				echo "<div class=\"error\" >Username field blank.  Please enter a username.</div>";
			}
			else if($_GET['error'] == 'noPass')
			{
				echo "<div class=\"error\" >Password field blank.  Please enter a password.</div>";
			}
			else if($_GET['error'] == 'nameUsed')
			{
				echo "<div class=\"error\" >Username '$li' is in use already.  Please choose another or log in.</div>";
			}
			else if($_GET['error'] == 'passMismatch')
			{
				echo "<div class=\"error\" >The passwords you entered did not match.  Please try again.</div>";
			}
?>
	</body>
</html>
