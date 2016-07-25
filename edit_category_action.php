<?php
include"connection.php";
$cname=$_REQUEST['cat_name'];
$des=$_REQUEST['des'];
$course=$_REQUEST['course'];
$query="update `category` set description='".$des."' where category='".$cname."'";
mysqli_query($con,$query);
header("location:view_category.php");
?>