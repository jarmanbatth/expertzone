<?php
include"connection.php";
$cat=$_REQUEST['cat_name'];
$des=$_REQUEST['des'];
$course=$_REQUEST['course'];
$query="insert into `category` values('".$cat."','".$des."','".$course."')";
$query1="select * from `category`";
$res=mysqli_query($con,$query1);
$flag=0;
while($row=mysqli_fetch_array($res))
{
    if($cat==$row[0])
    {
        $flag=1;
        break;
    }
}
if($flag==1)
    {
    header("location:add_category.php?q=1");
    }
else
{
   mysqli_query($con,$query);
   header("location:view_category.php");
    }

