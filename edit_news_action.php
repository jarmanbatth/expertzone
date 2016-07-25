<?php
include("connection.php");
$newsid=$_REQUEST['id'];
$title=$_REQUEST['title'];
$des=$_REQUEST['des'];
$email=$_REQUEST['email'];
$query="update news set description='".$des."',title='".$title."' where newsid='".$newsid."'";
echo $query;
mysqli_query($con,$query);
header("location: viewnews.php");
?>
