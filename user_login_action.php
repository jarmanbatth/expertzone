<?php

include"connection.php";
$e=$_REQUEST['email'];
$p=$_REQUEST['pass'];
$query="select * from signup";
$res=mysqli_query($con,$query);
$flag=0;
while($row=mysqli_fetch_array($res))
{
    if($e==$row[2]&&$p==$row[3])
    {
        $flag=1;
        break;
    }
}
if($flag==1)
{
    session_start();
    $_SESSION['user']=$e;
    header("location:user_home.php");
}
else
{
    header("location:user_login.php?q=12");
}