<?php

include "mysqli_connect.php"; // Using database connection file here

$id = $_GET['appID']; // get appID through query string
$photo = $_GET['photo'];
$biog = $_GET['biog'];
$receipt = $_GET['receipt'];


$path = "images/".$photo;
$pathb = "images/".$biog;
$pathr = "images/".$receipt;



$del = mysqli_query($con,"DELETE FROM applicants WHERE appID = '$id'"); // delete query


if($del)
{
    unlink($path); 
    unlink($pathb); 
    unlink($pathr); 
    mysqli_close($con); // Close connection
    header("location:index.php#apply"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>