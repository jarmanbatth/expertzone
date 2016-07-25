<?php
    include("connection.php");
session_start();
$e=$_REQUEST['mail'];
$o=$_REQUEST['opass'];
$n=$_REQUEST['npass'];
$c=$_REQUEST['cpass'];
$query="select * from admin";
$res=mysqli_query($con,$query);
$flag=0;
while($row=mysqli_fetch_array($res))
{
    if($e==$row[0] && $o==$row[1])
    {
        $flag=1;
        break;
    }
}
if($flag==1)
{
    if($n==$c)
    {
        $query="update admin set password='".$n."' where email='".$e."'";
        mysqli_query($con,$query);
        header("location: login.php");
    }
    else
    {
        header("location: changepassword.php?q=4");
    }
}
else
{
    header("location: changepassword.php?q=5");
}