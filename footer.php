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
	<div id="page">
		<div id="sidebar">
			<ul>
				<li>
					<h2>Actions</h2>
					<ul>
						<?php
							if(isset($_SESSION['li'])){
								$type = $_SESSION['type'];
								echo "<li><a href='makeForm.php'>Create new form</a></li>";
								echo "<li><a href='applications.php'>Edit saved forms</a></li>";
								echo "<li><a href='pend.php'>Check pending forms</a></li>";
								if($type == 'faculty' || $type == 'irb_member' || $type == 'irb_admin'){ echo "<li><a href='#'>Check student forms</a></li>"; }
								if($type == 'irb_member' || $type == 'irb_admin'){ echo "<li><a href='review.php'>Approve forms</a></li>"; }
								if($type == 'irb_admin'){ echo "<li><a href='admin.php'>IRB Administrator page</a></li>"; }
							}
						?>
					</ul>
				</li>
			</ul>
		</div>
		<!-- end #sidebar -->
		<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end #page -->
</div>
<div id="footer-wrapper">
	<div id="footer">
		<p>Copyright (c) 2011 Sitename.com. All rights reserved. Design by <a href="http://www.freecsstemplates.org/">Free CSS Templates</a></p>
	</div>
	<!-- end #footer -->
</div>
</body>
</html>