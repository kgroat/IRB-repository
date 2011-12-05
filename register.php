<?php
	session_start();

	include 'db_connect.php';

	//Look for user in DB, protect against mysql injection
	$li = mysqli_real_escape_string($db, $_POST['login']);
	$pw1 = mysqli_real_escape_string($db, $_POST['password1']);
	$pw2 = mysqli_real_escape_string($db, $_POST['password2']);
	//Check for blank username, redirect with error if blank
	if($li == "")
	{
		header('Location: addUser.php?error=noName');
		exit;
	}
	//Check for blank password, redirect with error if blank
	if($pw1 == "")
	{
		header('Location: addUser.php?error=noPass');
		exit;
	}

	$query = "SELECT username FROM users WHERE username = '$li';";
	$response = mysqli_query($db, $query);
	//If username is in the DB
	if($row = mysqli_fetch_array($response))
	{
		//Redirect to registration page with "User exists, try again" error
		header('Location: addUser.php?error=nameUsed');
		exit;
	}
	//If username isn't in the DB, add it in.  Also add password hash.
	else
	{
		//Check for matching passwords, redirect if there's a mismatch
		if($pw1 == $pw2){
			$query = "INSERT INTO users (username, password) VALUES ('$li', SHA('$pw1'));";
			$addResponse = mysqli_query($db, $query) or die("Error querying database");
			$_SESSION['li'] = $li;
			$_SESSION['type'] = 'student';
			header('Location: userCreated.php');
			//Redirect to login page with "User Added" message
			//*******************KEVIN NEEDS TO LOOK AT THIS******************************************************************
			//I only had to do a couple of minor tweaks, otherwise looks good! - Kevin
		}
		else
		{
			header('Location: addUser.php?error=passMismatch');
			exit;
		}
	}
?>
