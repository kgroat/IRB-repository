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
			$query = "SELECT * FROM expedited_2 WHERE form_key = '$form';";
			$result3 = mysqli_query($db, $query);
			if ($row = mysqli_fetch_array($result3)) {
				//Form exists, and user has permission to edit it
				$rationale = mysqli_real_escape_string($db, $_POST['rationale']);
				$methods = mysqli_real_escape_string($db, $_POST['methods']);
				$query = "UPDATE expedited_2 SET rationale = '$rationale', methods = '$methods' WHERE form_key = '$form';";
				mysqli_query($db, $query);
			}
		}
	}
?>
<HTML>
	<HEAD>
		<?php
			echo "<meta HTTP-EQUIV='REFRESH' content='0; url=expedited3.php?key=$app'/>";
		?>
	</HEAD>
</HTML>