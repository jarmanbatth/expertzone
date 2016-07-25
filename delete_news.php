<?php
include"connection.php";
$news_id=$_REQUEST['q'];
$query="delete from `news` where newsid='".$news_id."'";
mysqli_query($con,$query);
header("location: viewnews.php");
?>