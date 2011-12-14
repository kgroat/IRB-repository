<?php
	session_start();
	include 'db_connect.php';
	
	$li = mysqli_real_escape_string($db, $_POST['login']);
	$pw = mysqli_real_escape_string($db, $_POST['password']);
	$query = "SELECT * FROM users WHERE username = '$li' AND password = sha('$pw');";
	$result = mysqli_query($db, $query);
	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['li'] = $li;
		$_SESSION['type'] = $row['usertype'];
		echo "<meta HTTP-EQUIV='REFRESH' content='0; url=loginConfirm.php?li=$li'/>";
	}else{
		echo "<meta HTTP-EQUIV='REFRESH' content='0; url=loginConfirm.php'/>";
	}
?>