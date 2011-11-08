<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Login</title>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<?php
	include 'header.php';
	include 'db_connect.php';
	$li = $_POST['login'];
	$pw = $_POST['password'];
	echo '<p>'.$li.'</p>';
	echo '<p>'.$pw.'</p>';
   	$query = "SELECT * FROM users WHERE username = '$li' AND password = sha('$pw');";
   	$result = mysqli_query($db, $query);
   	if ($row = mysqli_fetch_array($result)) {
   		echo "<p>Thanks for logging in, $name</p>\n";
   		echo "<p><a href=\"index.php\">Continue back to Home Page</a></p>";
        $_SESSION['li'] = $name;
   	}else{
        $_SESSION['li'] = $name;
   		echo "<p>No user with that username / password combination </p>";
   	}
?>
</body>
</html>