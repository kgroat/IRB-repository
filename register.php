<?php
	//session_start();
	//if(!isset($_SESSION['li'])){
	//	header("Location: index.html");
	//}

	include 'db_connect.php';
	//$li = $_SESSION['li'];

	//Look for user in DB, protect against mysql injection
	$li = mysqli_real_escape_string($db, $_POST['login']);
	$pw = mysqli_real_escape_string($db, $_POST['password']);
	//Check for blank username, redirect with error if blank
	if($li == "")
	{
		header('Location: addUser.php?error=noName');
		exit;
	}
	//Check for blank password, redirect with error if blank
	if($pw == "")
	{
		header('Location: addUser.php?error=noPass');
		exit;
	}

	$query = "SELECT username FROM users WHERE username = '$li'";
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
		if(password1 == password2)
		{
		$query = "INSERT INTO users (username,password) VALUES ($li,SHA('$pw'))";
		$addResponse = mysqli_query($db,$query) or die("Error querying database");
		//Redirect to login page with "User Added" message
		//*******************KEVIN NEEDS TO LOOK AT THIS******************************************************************
		}
		else
		{
			header('Location: addUser.php?=passMismatch');
			exit;
		}
	}
?>
