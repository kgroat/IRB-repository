<?php 
	session_start(); 
	include 'db_connect.php';
	$li = $_SESSION['li'];
	$query = "INSERT INTO expedited_1 (title) VALUES ('Untitled');";
	mysqli_query($db, $query);
	$form = mysqli_insert_id($db);
	$query = "INSERT INTO expedited_2 (form_key) VALUES ($form);";
	mysqli_query($db, $query);
	$query = "INSERT INTO expedited_3 (form_key) VALUES ($form);";
	mysqli_query($db, $query);
	$query = "INSERT INTO expedited_4 (form_key) VALUES ($form);";
	mysqli_query($db, $query);
	$query = "INSERT INTO expedited_5 (form_key) VALUES ($form);";
	mysqli_query($db, $query);
	$query = "INSERT INTO expedited_6 (form_key) VALUES ($form);";
	mysqli_query($db, $query);
	$query = "INSERT INTO application (type, form_key) VALUES ('expedited', $form);";
	mysqli_query($db, $query);
	$app = mysqli_insert_id($db);
	$query = "INSERT INTO users_to_applications (user, application_key) VALUES ('$li', $app);";
	mysqli_query($db, $query);
?>
<HTML>
	<HEAD>
		<?php
			echo "<meta HTTP-EQUIV='REFRESH' content='0; url=expedited1.php?key=$app'/>";
		?>
	</HEAD>
</HTML>