<?php
session_start();
include"connection.php";
$title=$_REQUEST['title'];
$des=$_REQUEST['des'];
$mail=$_REQUEST['email'];
$query="insert into news values(null,'".$title."','".$des."','".$mail."')";
mysqli_query($con,$query);
header("location:confirm_news.php");
?>