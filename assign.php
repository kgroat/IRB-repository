<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Submitted Applications</title>
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
							
								<form method=post action=assignController.php><h3>Select IRB Member: 
								<select name="user">
								<?php
								$query = "SELECT * FROM users WHERE (usertype = 'irb_member') OR (usertype = 'irb_admin');";
								$result0 = mysqli_query($db, $query);
						   		while ($row = mysqli_fetch_array($result0)) {
						   		$user = $row['username'];
								echo "<option value=$user>$user</option>";
								}
								?>
								</select></h3>
							
								<?php
									$query = "SELECT * FROM users_to_applications;";
									$result = mysqli_query($db, $query);
						   			while ($row = mysqli_fetch_array($result)) {
						   				$name = $row['user'];
						   				$app = $row['application_key'];
						   				$query = "SELECT * FROM application WHERE pri_key = '$app';";
										$result2 = mysqli_query($db, $query);
						   				if($row = mysqli_fetch_array($result2)) {
						   					$form = $row['form_key'];
						   					$query = "SELECT * FROM expedited_1 WHERE pri_key = '$form';";
											$result3 = mysqli_query($db, $query);
											if($row = mysqli_fetch_array($result3)) {
												$title = $row['title'];
												$query = "SELECT * FROM irb_to_applications WHERE application_key = '$app';";
												$result4 = mysqli_query($db, $query);
												if($row = mysqli_fetch_array($result4)) {
													$status = $row['status'];
													//echo "<p>$name -- $status</p>";
												
												} else {
													echo "<p><input type=\"checkbox\" value=\"$app\" name=\"forms[]\">$title -- Submitted by $name</p>";
												}
											}
						   				}
						   			}
								?>

									<input type='submit' id='assignMember' value='Assign Member' />
								</form>
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