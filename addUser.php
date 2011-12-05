<?php session_start(); ?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Enter your information</title>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<?php
	include 'header.php';
	include 'db_connect.php';
	$li = $_SESSION['li'];
?>
<div id="wrapper">
	<div id="page">
		<div id="content">
			<div class="post">
				<div class="bg1">
					<div class="bg2">
						<div class="bg3">
							<h2 class="title">Enter your information:</h2>
							<div class="entry">
								<?php
						
									//include 'register.php';
									include 'db_connect.php';
									
						
									echo "<form method='post' action='register.php'>";
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
									echo "</form>";
									//Handle funky errors from register.php (noName, noPass, nameUsed, passMismatch)
									if($_GET['error'] == 'noName')
									{
										echo "<div class=\"error\" >Username field blank.  Please enter a username.</div>";
									}
									else if($_GET['error'] == 'noPass')
									{
										echo "<div class=\"error\" >Password field blank.  Please enter a password";
									}
									else if($_GET['error'] == 'nameUsed')
									{
										echo "<div class=\"error\" >Username '$li' is in use already.  Please choose another or log in.";
									}
									else if($_GET['error'] == 'passMismatch')
									{
										echo "<div class=\"error\" >The passwords you entered did not match.  Please try again.";
									}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>

<?php
   	include 'footer.php';
?>

</body>
</html>