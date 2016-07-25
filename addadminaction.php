<?php
include("connection.php");
session_start();
$email=$_REQUEST['email'];
$pass=$_REQUEST['pass'];
$cpass=$_REQUEST['cpass'];
$fname=$_REQUEST['fname'];
$lname=$_REQUEST['lname'];
$cat=$_REQUEST['category'];
$query=("select * from admin");
$r=mysqli_query($con,$query);
$flag=0;
while($row=mysqli_fetch_array($r))
{
    if($row[0]==$email)
    {
       $flag=1;
        break;
    }

}
if($flag==1)
{
    header("location: addadmin.php?q=1");
}
else
{
    if($pass==$cpass)
        {
            $q="insert into admin values('".$email."','".$pass."','".$fname."','".$lname."','".$cat."')";
            mysqli_query($con,$q);
            echo $q;
            header("location:login.php?q=10");
        }

    else
    {
        header("location: addadmin.php?q=2");
    }

}

