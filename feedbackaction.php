<?php
include"connection.php";
$email=$_REQUEST['mail'];
$msg=$_REQUEST['message'];
$type=$_REQUEST['sel'];
$query="insert into feedback values(null,'".$email."','".$msg."','".$type."')";
mysqli_query($con,$query);
header("location:login.php?q=0");