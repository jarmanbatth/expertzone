<?php
include("connection.php");
$f=$_REQUEST['fname'];
$l=$_REQUEST['lname'];
$em=$_REQUEST['email'];
$pass=$_REQUEST['pass'];
$cp=$_REQUEST['cpass'];
$m=$_REQUEST['mobile'];
$que=$_REQUEST['que'];
$ans=$_REQUEST['ans'];
$name=$_FILES['file1']['name'];
$temp=$_FILES['file1']['tmp_name'];
$type=$_FILES['file1']['type'];
$size=$_FILES['file1']['size'];
if($type=="image/jpeg" || $type=="image/png" || $type=="image/gif")
{
    $path="image/".$name;
    move_uploaded_file($temp,$path);
    $query="insert into signup values('".$f."','".$l."','".$em."','".$pass."','".$m."','".$que."','".$ans."','".$path."')";
    if($pass==$cp)
    {
        echo $query;
        session_start();
        include_once 'securimage.php';
        $securimage = new Securimage();
        if ($securimage->check($_REQUEST['cap']) == false)
        {
            header("location:signup.php?q=1") ;
        }
        else
        {
            mysqli_query($con,$query);
            header("location:user_login.php?q=10");
        }

        mysqli_query($con,$query);
        header("location:user_login.php?q=10");

    }
    else
    {
        header("location:signup.php?q=11") ;

    }
}
else
{
 header("location:signup.php?q=16")   ;
}


