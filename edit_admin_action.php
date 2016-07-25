<?php
include("connection.php");
$mail=$_REQUEST['email'];
$category=$_REQUEST['category'];
$query="update admin set category='".$category."' where email='".$mail."'";
echo $query;
mysqli_query($con,$query);
header("location: viewadmins.php");
?>
