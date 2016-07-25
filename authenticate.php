<?php
include("connection.php");
session_start();
$em=$_REQUEST['mail'];
$p=$_REQUEST['pass'];
$category=$_REQUEST['category'];
$query="select * from admin";
$res=mysqli_query($con,$query);
$flag=0;
while($row=mysqli_fetch_array($res))
{
    if($em==$row[0] && $p==$row[1] && $category ==$row[4] )
    {
        $flag=1;
        break;
    }
}
if($flag==1)
{
    session_start();
    $_SESSION['admin']=$em;
    $_SESSION['type']=$category;
    header("location:home.php");
}
else
{
    header("location: login.php?q=3");
}