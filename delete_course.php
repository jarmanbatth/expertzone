<?php
include"connection.php";
$cname=$_REQUEST['q'];
$query="delete from `course` where course_name='".$cname."'";
mysqli_query($con,$query);
header("location: view_course.php?q=1");
?>