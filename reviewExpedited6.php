<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Risks and Benefits to Participants</title>
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
							<h2 class="title">Risks and Benefits to Participants</h2>
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
											$query = "SELECT * FROM expedited_6 WHERE form_key = '$form';";
											$result3 = mysqli_query($db, $query);
											if ($row = mysqli_fetch_array($result3)) {
												//Form exists, and user has permission to edit it
												$risk = $row['risk'];
												$procedures = $row['procedures'];
												$benefits = $row['benefits'];
												$outweigh = $row['outweigh'];
												
												echo "<form method='post' action='expedited6submit.php'>";
													echo "<input type='hidden' name='app' id='app' value='$app'/>";
													echo "<p>Risk to participants used in research may be minimal but is never totally absent.  Given this, describe <u>in detail</u> any possible physical, psychological, social, political, legal, economic, or other risks to the subjects, either immediate or long range:</p><textarea name='risk' id='risk' cols=80 rows=6>$risk</textarea><p></p>";
													echo "<p>Describe what procedures will be used to minimize each risk you have stated above.  If subjects need to be debriefed at the end of the study, a copy of the debriefing statement should be attached.</p><textarea name='procedures' id='procedures' cols=80 rows=6>$procedures</textarea><p></p>";
													echo "<p>If the benefits of the study are not clear from the rationale statement please describe the benefits of the research to the participants in the study and to society at large. If the subject will not benefit directly from the research, this should be so stated.</p><textarea name='benefits' id='benefits' cols=80 rows=6>$benefits</textarea><p></p>";
													echo "<p>Explain how the benefits outweigh the risks involved.</p><textarea name='outweigh' id='outweigh' cols=80 rows=6>$outweigh</textarea><p></p>";
													//echo "<input type='submit' value='Save and finish' />";
													echo "</form>";
echo "<p><a href=reviewExpedited5.php?key=$app>Part 5</a>";
											echo "<form method='post' action='reviewController.php?form=$app'>";
												echo "<center><p><Input type='Radio' Name='review' value= 'approve'>Approve  <Input type='Radio' Name='review' value='deny'>Deny</p>";
												echo "<p>Comment: (Optional)</p>";
												echo "<textarea name='comment' id='comment' cols=80 rows=6></textarea>";
												echo "<input type='hidden' id='form' name='form' value='$app' />";
												echo "<input type='submit' value='Submit Review Decision' /></center>";
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