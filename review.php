<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Application view</title>
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
							<h2 class="title"></h2>
							<div class="entry">
								<?php
									$query = "SELECT * FROM irb_to_applications WHERE user = '$li' AND status='Pending';";
									$result = mysqli_query($db, $query);
						   			while ($row = mysqli_fetch_array($result)) {
						   				$app = $row['application_key'];
						   				$query = "SELECT * FROM application WHERE pri_key = '$app';";
										$result2 = mysqli_query($db, $query);
						   				if($row = mysqli_fetch_array($result2)) {
						   					$form = $row['form_key'];
						   					$query = "SELECT * FROM expedited_1 WHERE pri_key = '$form';";
											$result3 = mysqli_query($db, $query);
											if($row = mysqli_fetch_array($result3)) {
												$name = $row['title'];
												echo "<p><a href='reviewExpedited1.php?key=$app'>$name</a></p>";
											}
						   				}
						   			}
								?>
								<p><a href=previousReview.php>Previously Reviewed</a></p>
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