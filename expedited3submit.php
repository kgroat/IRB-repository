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
			$query = "SELECT * FROM expedited_3 WHERE form_key = '$form';";
			$result3 = mysqli_query($db, $query);
			if ($row = mysqli_fetch_array($result3)) {
				//Form exists, and user has permission to edit it
				$sex = $_POST['sex'];
				$min_age = mysqli_real_escape_string($db, $_POST['min_age']);
				$max_age = mysqli_real_escape_string($db, $_POST['max_age']);
				$q1 = $_POST['q1'] == 'on';
				$q2 = $_POST['q2'] == 'on';
				$recruitment = mysqli_real_escape_string($db, $_POST['recruitment']);
				$query = "UPDATE expedited_3 SET sex = '$sex', min_age = '$min_age', max_age = '$max_age', q1 = '$q1', q2 = '$q2', recruitment = '$recruitment';";
				mysqli_query($db, $query);
			}
		}
	}
?>
<HTML>
	<HEAD>
		<?php
			echo "<meta HTTP-EQUIV='REFRESH' content='0; url=expedited4.php?key=$app'/>";
		?>
	</HEAD>
</HTML>