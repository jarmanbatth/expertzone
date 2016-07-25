<?php
include("connection.php");
$f=$_REQUEST['fname'];
$l=$_REQUEST['lname'];
$em=$_REQUEST['email'];
$pass=$_REQUEST['pass'];
$cp=$_REQUEST['cpass'];
$mobile=$_REQUEST['mobile'];
$age=$_REQUEST['age'];
$des=$_REQUEST['designation'];
$add=$_REQUEST['address'];
$name=$_FILES['file1']['name'];
$temp=$_FILES['file1']['tmp_name'];
$type=$_FILES['file1']['type'];
$size=$_FILES['file1']['size'];
if($type=="image/jpeg" || $type=="image/png" || $type=="image/gif" || $type=="image/jpg" )
{
    $path="image/".$name;
    move_uploaded_file($temp,$path);
    $q1="select * from employee";
    $r=mysqli_query($con,$q1);
    $flag=0;
    while($row=mysqli_fetch_array($r))
    {
        if($row[2]==$em)
        {
            $flag=1;
            break;
        }

    }
    if($flag==1)
    {
        header("location:addnewemployee.php?q=4");
    }
    else
    {
    $query="insert into `employee` values('".$f."','".$l."','".$em."','".$mobile."','".$pass."','".$age."',null,'".$des."','".$path."','".$add."')";
    if($pass==$cp)
    {
        echo $query;
        mysqli_query($con,$query);
        header("location:addnewemployee.php?q=1");

    }
    else
    {
        header("location:addnewemployee.php?q=2") ;

    }
    }
}
else
{
    header("location:addnewemployee.php?q=3")   ;
}


