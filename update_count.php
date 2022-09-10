<?php
include 'mysqli_connect.php';
$type=$_POST['type'];
$appID=$_POST['appID'];
if($type=='like'){
	$sql="UPDATE applicants2 SET like_count=like_count+1 WHERE appID=$appID;";
}else{
	$sql="UPDATE applicants2 SET dislike_count=dislike_count+1 WHERE appID=$appID";
}
$res=mysqli_query($con,$sql);
?>
