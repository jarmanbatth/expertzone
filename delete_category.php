<?php
include"connection.php";
$cname=$_REQUEST['q'];
$query="delete from `category` where category='".$cname."'";
mysqli_query($con,$query);
header("location: view_category.php");
?>