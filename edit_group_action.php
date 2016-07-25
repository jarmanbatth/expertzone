<?php
include("connection.php");
$gname=$_REQUEST['gname'];
$ac=$_REQUEST['ac'];
$des=$_REQUEST['des'];
$icon=$_REQUEST['icon'];
$query="update `group` set article_count='".$ac."', description='".$des."', icon='".$icon."' where group_name='".$gname."'";
echo $query;
mysqli_query($con,$query);
header("location: viewgroup.php");
?>
