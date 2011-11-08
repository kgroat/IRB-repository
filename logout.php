<?php
session_start();
if(!isset($_SESSION['li'])){
	header("Location: index.html");
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Logged Out</title>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<?php
	$li = $_SESSION['li'];
	$_SESSION['li'] = NULL;
	$_SESSION['ut'] = NULL;
	session_destroy();
	include 'header.php';
	echo "<p>Thank you for visiting, $li</p>";
?>
</body>
</html>