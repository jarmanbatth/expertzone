<?php
include("connection.php");
session_start();
$e=$_REQUEST['mail'];
$o=$_REQUEST['opass'];
$n=$_REQUEST['npass'];
$c=$_REQUEST['cpass'];
$query="select * from employee";
$res=mysqli_query($con,$query);
$flag=0;
while($row=mysqli_fetch_array($res))
{
    if($e==$row[2] && $o==$row[4])
    {
        $flag=1;
        break;
    }
}
if($flag==1)
{
    if($n==$c)
    {
        $query="update `employee` set password='".$n."' where email='".$e."'";
        mysqli_query($con,$query);
        header("location: emp_login.php?q=4");
    }
    else
    {
        header("location:emp_changepassword.php?q=2");
    }
}
else
{
    header("location: emp_changepassword.php?q=3");
}