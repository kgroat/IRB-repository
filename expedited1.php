<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>General information</title>
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
							<h2 class="title">General information</h2>
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
											$query = "SELECT * FROM expedited_1 WHERE pri_key = '$form';";
											$result3 = mysqli_query($db, $query);
											if ($row = mysqli_fetch_array($result3)) {
												//Form exists, and user has permission to edit it
												$title = $row['title'];
												$abstract = $row['abstract'];
												$q1 = $row['q1'];
												$q2 = $row['q2'];
												$q3 = $row['q3'];
												$q4 = $row['q4'];
												$q5 = $row['q5'];
												$q6 = $row['q6'];
												$q7 = $row['q7'];
												$review = $row['review'];
												$q8 = $row['q8'];
												$irb_date = $row['irb_date'];
												$irb_nbr = $row['irb_nbr'];
												
												echo "<form method='post' action='expedited1submit.php'>";
													echo "<input type='hidden' name='app' id='app' value='$app'/>";
													echo "<p>Title: <input type='text' name='title' id='title' value='$title' size='15' /></p>";
													echo "<p>Abstract:</p><textarea name='abstract' id='abstract' cols=80 rows=6>$abstract</textarea><p></p>";
													echo "<p><input type='checkbox' name='q1' id='q1' "; if($q1){ echo "checked"; } echo " /> All questions on the application have been answered.</p>";
													echo "<p><input type='checkbox' name='q2' id='q2' "; if($q2){ echo "checked"; } echo " /> The application has been signed by the investigator and, if necessary, the advisor.</p>";
													echo "<p><input type='checkbox' name='q3' id='q3' "; if($q3){ echo "checked"; } echo " /> If appropriate, a copy of the written or oral consent script has been enclosed.</p>";
													echo "<p><input type='checkbox' name='q4' id='q4' "; if($q4){ echo "checked"; } echo " /> If appropriate, a copy of the written or oral debriefing script has been enclosed.</p>";
													echo "<p><input type='checkbox' name='q5' id='q5' "; if($q5){ echo "checked"; } echo " /> I HAVE ATTACHED A CERTIFICATE OF ETHICS TRAINING</p><h/>";
													echo "<p><input type='checkbox' name='q6' id='q6' "; if($q6){ echo "checked"; } echo " /> Is the research currently being funded, in whole or in part, with federal dollars?</p>";
													echo "<p><input type='checkbox' name='q7' id='q7' "; if($q7){ echo "checked"; } echo " /> Has the research been reviewed by the IRB?</p>";
													echo "<p>If “yes”, please give the date of the review: <input type='text' name='review' id='review' value='$review' size='15' /></p>";
													echo "<p><input type='checkbox' name='q8' id='q8' "; if($q8){ echo "checked"; } echo " /> Do you believe that this research meets expedited review criteria?</p>";
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