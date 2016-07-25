<?php
include"connection.php";
$id=$_REQUEST['q'];
$query1="delete from `steps` where article_id=".$id."";
mysqli_query($con,$query1);
$query="delete from `article` where article_id='".$id."'";
mysqli_query($con,$query);
header("location: admin_view_article.php");
?>