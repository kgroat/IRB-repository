<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Characteristics of Subjects</title>
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
							<h2 class="title">Characteristics of Subjects</h2>
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
											$query = "SELECT * FROM expedited_3 WHERE form_key = '$form';";
											$result3 = mysqli_query($db, $query);
											if ($row = mysqli_fetch_array($result3)) {
												//Form exists, and user has permission to edit it
												$sex = $row['sex'];
												$min_age = $row['min_age'];
												$max_age = $row['max_age'];
												$q1 = $row['q1'];
												$q2 = $row['q2'];
												$recruitment = $row['recruitment'];
												
												echo "<form method='post' action='expedited3submit.php'>";
													echo "<input type='hidden' name='app' id='app' value='$app'/>";
													echo "Sex: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='radio' name='sex' value='m' "; if($sex == 'm'){ echo "checked"; } echo "> male </input>"; 
													echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='radio' name='sex' value='f' "; if($sex == 'f'){ echo "checked"; } echo "> female </input>"; 
													echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='radio' name='sex' value='both' "; if($sex == 'both'){ echo "checked"; } echo "> both </input><p></p>"; 
													echo "<p>Potential age range: <input type='text' name='min_age' id='min_age' value='$min_age' size='15' /> to <input type='text' name='max_age' id='max_age' value='$max_age' size='15' /></p>";
													echo "<p><input type='checkbox' name='q1' id='q1' "; if($q1){ echo "checked"; } echo " /> <b>ANY</b> subjects under 18?</p>";
													echo "<p><input type='checkbox' name='q2' id='q2' "; if($q2){ echo "checked"; } echo " /> Are subjects either (a) mentally incompetent, or (b) legally restricted (i.e. institutionalized)? If yes, please explain the necessity for using this particular group.</p>";
													echo "<p>Describe in detail how subjects will be identified and recruited.  Provide explicit detail about how and by whom subjects will be recruited.  Do NOT merely state “Volunteers.”   If you will be using a specific ethnic group, please describe:";
													echo "<textarea name='recruitment' id='recruitment' cols=80 rows=12>$recruitment</textarea><p></p>";
													//echo "<input type='submit' value='Save and continue...' />";
												echo "<p><a href=reviewExpedited2.php?key=$app>Part 2</a> | <a href=reviewExpedited4.php?key=$app>Part 4</a></p>";
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