<?php 
	session_start(); 
	include 'db_connect.php';
	$li = $_SESSION['li'];
	$app = mysqli_real_escape_string($db, $_POST['app']);
	$query = "SELECT * FROM users_to_applications WHERE user = '$li' AND application_key = '$app';";
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
				$privacy = mysqli_real_escape_string($db, $_POST['privacy']);
				$confidentiality = mysqli_real_escape_string($db, $_POST['confidentiality']);
				$recorded = $_POST['recorded'] == 'on';
				$records = mysqli_real_escape_string($db, $_POST['records']);
				
				$query = "UPDATE expedited_5 SET privacy = '$privacy', confidentiality = '$confidentiality', recorded = '$recorded', records = '$records';";
				mysqli_query($db, $query);
			}
		}
	}
?>
<HTML>
	<HEAD>
		<?php
			echo "<meta HTTP-EQUIV='REFRESH' content='0; url=expedited6.php?key=$app'/>";
		?>
	</HEAD>
</HTML>