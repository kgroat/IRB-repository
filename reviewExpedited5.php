<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Confidentiality</title>
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
							<h2 class="title">Confidentiality</h2>
							<div class="entry">
								<?php
									$li = $_SESSION['li'];
									$app = mysqli_real_escape_string($db, $_GET['key']);
									$query = "SELECT * FROM users_to_applications WHERE application_key = '$app';";
									$result = mysqli_query($db, $query);
									if ($row = mysqli_fetch_array($result)) {
										$query = "SELECT * FROM application WHERE pri_key = '$app';";
										$result2 = mysqli_query($db, $query);
										if ($row = mysqli_fetch_array($result2)) {
											$form = $row['form_key'];
											$query = "SELECT * FROM expedited_5 WHERE form_key = '$form';";
											$result3 = mysqli_query($db, $query);
											if ($row = mysqli_fetch_array($result3)) {
												//Form exists, and user has permission to edit it
												$privacy = $row['privacy'];
												$confidentiality = $row['confidentiality'];
												$recorded = $row['recorded'];
												$records = $row['records'];
												
												echo "<form method='post' action='expedited5submit.php'>";
													echo "<input type='hidden' name='app' id='app' value='$app'/>";
													echo "<p>Indicate what precautions will be taken to ensure the privacy of the subjects:</p><textarea name='privacy' id='privacy' cols=80 rows=6>$privacy</textarea><p></p>";
													echo "<p>Indicate what precautions will be taken to ensure the confidentiality of the data, both what remains in the investigator’s possession and that which is contained in reports and publications:</p><textarea name='confidentiality' id='confidentiality' cols=80 rows=6>$confidentiality</textarea><p></p>";
													echo "<p><input type='checkbox' name='recorded' id='recorded' "; if($recorded){ echo "checked"; } echo " /> Will audio, video or film recording of subjects be used?</p>";
													echo "<p>(If yes, specific permission must be sought in the consent letter)</p>";
													echo "<p>What will happen to the data records when the research is completed?</p><textarea name='records' id='records' cols=80 rows=6>$records</textarea><p></p>";
													//echo "<input type='submit' value='Save and continue...' />";
		echo "<p><a href=reviewExpedited4.php?key=$app>Part 4</a> | <a href=reviewExpedited6.php?key=$app>Part 6</a></p>";
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