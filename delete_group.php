<?php
include"connection.php";
$group=$_REQUEST['q'];
$query="delete from `group` where group_name='".$group."'";
mysqli_query($con,$query);
header("location: viewgroup.php");
?>