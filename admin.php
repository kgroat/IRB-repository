<?php session_start(); ?>
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
<?php
	include 'header.php';
	?>
	
	<!-- end #menu -->
	<div id="page">
		<div id="content">
			<div class="post">
				<div class="bg1">
					<div class="bg2">
						<div class="bg3">
							<h2 class="title"><a href="X">Admin Control Panel</a></h2>
							<div class="entry">
								<p>Below are all the actions available for administrators.</p>
	<h3>Change User Type</h3>
	<form method="post" action="userSearch.php">
    	<label for="username">Search User:</label>
    	<input type="text" id="username" name="username" />
    	<input type="submit" value="Find User" name="submit" />
    </form>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
		<!-- end #content -->
		
		<!-- end #sidebar -->

	<!-- end #page -->
</div>
<?php
   	include 'footer.php';
?>
</body>
</html>