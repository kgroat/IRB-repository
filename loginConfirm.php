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
							$li = $_SESSION['li'];
						   	if ($li == $_GET['li'] && $li) {
						   		echo "<h2 class='title'><a href='#'>Login Successful</a></h2>";
						   		echo "<div class='entry'>";
						   			echo "<p>Thanks for logging in, $li</p>\n";
						   			echo "<p><a href='index.php'>Continue back to Home Page</a></p>";
						   		echo "</div>";
						   	}else if($li){
						   		echo "<h2 class='title'><a href='#'>Username Missmatch</a></h2>";
						   		echo "<div class='entry'>";
						   			echo "<p>The username logged in does not match the username given, but $li is still logged in.</p>\n";
						   			echo "<p><a href='index.php'>Continue back to Home Page</a></p>";
						   		echo "</div>";
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