
<?php

include"connection.php";
$e=$_REQUEST['email'];
$p=$_REQUEST['pass'];
$query="select * from `employee`";
$res=mysqli_query($con,$query);
$flag=0;
while($row=mysqli_fetch_array($res))
{
    if($e==$row[2]&&$p==$row[4])
    {
        $flag=1;
        break;
    }
}
if($flag==1)
{
    session_start();
    $_SESSION['emp']=$e;
    header("location:emp_home.php");
}
else
{
    header("location:emp_login.php?q=1");
}