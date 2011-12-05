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
							<h2 class="title"><a href="X">User Search</a></h2>
							<div class="entry">
								
								<form method=post action=changeType.php><h3>Change User Type To: 
								<select name="type">
								<option value=student>Student</option>
								<option value=faculty>Faculty</option>
								<option value=irb_member>IRB Member</option>
								<option value=irb_admin>IRB Admin</option>
								</select></h3>

	<?php

	include('db_connect.php');

	$name = mysqli_real_escape_string($db, trim($_POST['username']));

	$query="SELECT * FROM users WHERE username LIKE '%$name%'";
	$result=mysqli_query($db, $query)
		or die("Error Querying Database");
		
		echo"<hr/>";
		
		while($row= mysqli_fetch_array($result)){
	
		$user=$row['id'];
		echo"<table>";
		echo "<tr><td width=140><input type=\"checkbox\" value=\"" . $row['username'] . "\" name=\"users[]\"> " 
			. $row['username'] . "</td><td width=25></td><td width=140>" . $row['usertype'] . "</td><br />";
		echo "</table>";
		echo"<br/><hr/>";
		}

	?>
						    	<input type="submit" value="Change User Type" name="submit" />
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