<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Login</title>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>

<?php
	include 'header.php';
	include 'db_connect.php';
?>

<div id="wrapper">
	<div id="page">
		<div id="content">
			<div class="post">
				<div class="bg1">
					<div class="bg2">
						<div class="bg3">
							<?php
							$li = mysqli_real_escape_string($db, $_POST['login']);
							$pw = mysqli_real_escape_string($db, $_POST['password']);
						   	$query = "SELECT * FROM users WHERE username = '$li' AND password = sha('$pw');";
						   	$result = mysqli_query($db, $query);
						   	if ($row = mysqli_fetch_array($result)) {
						   		echo "<h2 class='title'><a href='#'>Login Successful</a></h2>";
						   		echo "<div class='entry'>";
						   			echo "<p>Thanks for logging in, $li</p>\n";
						   			echo "<p><a href='index.php'>Continue back to Home Page</a></p>";
						   		echo "</div>";
						        $_SESSION['li'] = $li;
						        $_SESSION['type'] = $row['usertype'];
						   	}else{
						   		echo "<h2 class='title'><a href='#'>Login Failed</a></h2>";
						   		echo "<div class='entry'>";
						   			echo "<p>No user with that username / password combination; please try again.</p>";
						   		echo "</div>";
						   	}
						   	?>
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