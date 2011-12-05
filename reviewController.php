<?php
include "db_connect.php";
$review=$_POST['review'];
$comment=$_POST['comment'];
$form=$_POST['form'];
if(empty($review)){
mysqli_close($db);
header( 'Location: reviewExpedited6.php?error=noSel&key=' . $form);
exit;
}else{

if($review=='approve') {
$query="UPDATE irb_to_applications SET status = 'Approved', comment = '$comment' WHERE application_key = '$form'";
} else {
$query="UPDATE irb_to_applications SET status = 'Denied', comment = '$comment' WHERE application_key = '$form'";
}

$result = mysqli_query($db, $query);

mysqli_close($db);	
header( 'Location: review.php');
exit;  
}
?>