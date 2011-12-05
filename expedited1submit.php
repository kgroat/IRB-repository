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
			$query = "SELECT * FROM expedited_1 WHERE pri_key = '$form';";
			$result3 = mysqli_query($db, $query);
			if ($row = mysqli_fetch_array($result3)) {
				//Form exists, and user has permission to edit it
				$title = mysqli_real_escape_string($db, $_POST['title']);
				$abstract = mysqli_real_escape_string($db, $_POST['abstract']);
				$q1 = $_POST['q1'] == 'on';
				$q2 = $_POST['q2'] == 'on';
				$q3 = $_POST['q3'] == 'on';
				$q4 = $_POST['q4'] == 'on';
				$q5 = $_POST['q5'] == 'on';
				$q6 = $_POST['q6'] == 'on';
				$q7 = $_POST['q7'] == 'on';
				$review = mysqli_real_escape_string($db, $_POST['review']);
				$q8 = $_POST['q8'] == 'on';
				$query = "UPDATE expedited_1 SET title = '$title', abstract = '$abstract', q1 = '$q1', q2 = '$q2', q3 = '$q3', q4 = '$q4', q5 = '$q5', q6 = '$q6', q7 = '$q7', review = '$review', q8 = '$q8' WHERE pri_key = '$form';";
				mysqli_query($db, $query);
			}
		}
	}
?>
<HTML>
	<HEAD>
		<?php
			echo "<meta HTTP-EQUIV='REFRESH' content='0; url=expedited2.php?key=$app'/>";
		?>
	</HEAD>
</HTML>