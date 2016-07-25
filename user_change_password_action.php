<?php
include("connection.php");
session_start();
$e=$_REQUEST['mail'];
$o=$_REQUEST['opass'];
$n=$_REQUEST['npass'];
$c=$_REQUEST['cpass'];
$query="select * from signup";
$res=mysqli_query($con,$query);
$flag=0;
while($row=mysqli_fetch_array($res))
{
    if($e==$row[2] && $o==$row[3])
    {
        $flag=1;
        break;
    }
}
if($flag==1)
{
    if($n==$c)
    {
        $query="update signup set password='".$n."' where email='".$e."'";
        mysqli_query($con,$query);
        header("location: user_login.php");
    }
    else
    {
        header("location:user_change_password.php?q=13");
    }
}
else
{
    header("location: user_change_password.php?q=14");
}