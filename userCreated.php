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
	$li = $_SESSION['li'];
?>

<div id="wrapper">
	<div id="page">
		<div id="content">
		
			<div class="post">
				<div class="bg1">
					<div class="bg2">
						<div class="bg3">
							<h2 class="title">User Account Created Successfully</h2>
							<div class="entry">
								<?php 
									echo "Your account, $li, has been successfully added to the system.";
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