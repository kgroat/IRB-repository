<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Type of consent to be obtained</title>
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
							<h2 class="title">Type of consent to be obtained</h2>
							<div class="entry">
								<?php
									$li = $_SESSION['li'];
									$app = mysqli_real_escape_string($db, $_GET['key']);
									$query = "SELECT * FROM users_to_applications WHERE user = '$li' AND application_key = '$app';";
									$result = mysqli_query($db, $query);
									if ($row = mysqli_fetch_array($result)) {
										$query = "SELECT * FROM application WHERE pri_key = '$app';";
										$result2 = mysqli_query($db, $query);
										if ($row = mysqli_fetch_array($result2)) {
											$form = $row['form_key'];
											$query = "SELECT * FROM expedited_4 WHERE form_key = '$form';";
											$result3 = mysqli_query($db, $query);
											if ($row = mysqli_fetch_array($result3)) {
												//Form exists, and user has permission to edit it
												$oral = $row['oral'];
												$written = $row['written'];
												$assent = $row['assent'];
												
												echo "<form method='post' action='expedited4submit.php'>";
													echo "<input type='hidden' name='app' id='app' value='$app'/>";
													echo "<p><input type='checkbox' name='oral' id='oral' "; if($oral){ echo "checked"; } echo " /> Oral consent?</p>";
													echo "<p><input type='checkbox' name='written' id='written' "; if($written){ echo "checked"; } echo " /> Written consent?</p>";
													echo "<p><input type='checkbox' name='assent' id='assent' "; if($assent){ echo "checked"; } echo " /> Assent statement to be attached?</p>";
													echo "<input type='submit' value='Save and continue...' />";
												echo "</form>";
											}else{
												echo "ERROR: expedited form does not exist.";
											}
										}else{
											echo "ERROR: application does not exist.";
										}
									}else{
										echo "You do not have permission to edit this application form.";
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