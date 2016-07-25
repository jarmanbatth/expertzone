<?php
include"connection.php";
$gname=$_REQUEST['gname'];
$des=$_REQUEST['desc'];
echo $gname." ".$des;
$acount=0;
$name=$_FILES['file1']['name'];
$temp=$_FILES['file1']['tmp_name'];
$type=$_FILES['file1']['type'];
$flag=0;
$query1="select * from `group`";
$res= mysqli_query($con,$query1);
while($row=mysqli_fetch_array($res))
{
    if($gname==$row[0])
    {
        echo $row[0];
        $flag=1;
        break;
    }
}


if($flag==1)
{
    echo "Exists";
    header("location:new_group.php?q=17");
}
else
{
    if($type=="image/jpeg" || $type=="image/png" || $type=="image/gif")
    {
        echo "Done";
        $path="image/".$name;
        move_uploaded_file($temp,$path);
        $query="insert into `group` values('".$gname."',".$acount.",'".$des."','".$path."')";
        mysqli_query($con,$query);
        header("location:new_group.php?q=1");
    }
    else
    {
        echo "Image Type wrong";
    }
}
