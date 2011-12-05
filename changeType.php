<?php
session_start();
include "db_connect.php";
$users=$_POST['users'];
$type=$_POST['type'];
if(empty($users)){
mysqli_close($db);
header( 'Location: userSearch.php?error=noSel');
exit;
}else{
$N = count($users);
for($i=0;$i<$N;$i++){
$query="UPDATE users SET usertype = '$type' WHERE username='$users[$i]'";
$result = mysqli_query($db, $query);
}
mysqli_close($db);	
header( 'Location: userSearch.php?msg=typeChanged');
exit;  
}
?>