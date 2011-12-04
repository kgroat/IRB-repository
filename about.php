<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>About</title>
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
							<h2 class="title">About the IRB</h2>
							<div class="entry">
								<p>The Institutional Review Board is a set of professors working for the University of Mary Washington who oversee any and all experiments involving human test subjects.  All projects of this nature must first be reviewed by at least one board member before the experiment can be conducted on school grounds or with school equipment.</p>
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