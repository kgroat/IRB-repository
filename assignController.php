<?php
include "db_connect.php";
$user=$_POST['user'];
$forms=$_POST['forms'];
if(empty($forms)){
mysqli_close($db);
header( 'Location: assign.php?error=noSel');
exit;
}else{
$N = count($forms);
for($i=0;$i<$N;$i++){
$query="INSERT INTO irb_to_applications (user, application_key, status) VALUES ('$user', '$forms[$i]', 'Pending')";
$result = mysqli_query($db, $query);
}
mysqli_close($db);	
header( 'Location: assign.php?msg=formAssigned');
exit;  
}
?>