<?php
include"connection.php";
$a=$_REQUEST['q'];
$query="delete from `admin` where email='".$a."'";
mysqli_query($con,$query);
header("location: viewadmins.php");
?>
