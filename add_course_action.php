<?php
include"connection.php";
$name=$_REQUEST['course_name'];
$des=$_REQUEST['des'];
$course=$_REQUEST['course'];
$query="insert into `course` values('".$name."','".$des."','".$course."')";
$query1="select * from `course`";
$res1=mysqli_query($con,$query1);
$flag=0;
while($row1=mysqli_fetch_array($res1))
{
    if($name==$row1[0])
    {
        $flag=1;
        break;
    }
}
if($flag==1)
{
    header("location:add_course.php?q=1");
}
else
{
    mysqli_query($con,$query);
    header("location:add_course.php?q=2");
}

