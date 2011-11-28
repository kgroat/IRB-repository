<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Riding Hood  
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20110725

-->

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Riding Hood   by Free CSS Templates</title>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="wrapper">
	<div id="header">
		<div id="logo">
			<h1><a href="#">RidingHood</a></h1>
			<p> design by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a></p>
		</div>
		<div id="search">
			<?php
				$bob = $_SESSION['bob'];
				if( isset( $_SESSION['li'] ) ) {
					echo "<form method='post' action='logout.php'>";
							echo "<input type='submit' id='logout_button' value=$bob />";
					echo "</form>";
				} else {
					echo "<form method='post' action='login.php'>";
						echo "<fieldset>";
							echo "<input type='text' name='login' id='login' size='15' />";
							echo "<input type='password' name='password' id='password' size='15' />";
							echo "<input type='submit' id='login_button' value='Login' />";
						echo "</fieldset>";
					echo "</form>";
				}
			?>
		</div>
	</div>
	
	<!-- end #header -->

	<div id="menu">
		<ul>
			<li class="current_page_item"><a href="#">Home</a></li>
			<li><a href="#">Blog</a></li>
			<li><a href="#">Photos</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Links</a></li>
			<li><a href="#">Contact</a></li>
		</ul>
	</div>

	<!-- end #menu -->
	
</div>
</body>
</html>