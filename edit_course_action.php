<?php
include"connection.php";
$cname=$_REQUEST['course_name'];
$des=$_REQUEST['des'];
$course=$_REQUEST['course'];
$query="update `course` set description='".$des."' where course_name='".$cname."'";
mysqli_query($con,$query);
header("location:view_course.php");
?>