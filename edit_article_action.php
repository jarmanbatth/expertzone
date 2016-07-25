<?php
include("connection.php");
$id=$_REQUEST['id'];
$aname=$_REQUEST['aname'];
$des=$_REQUEST['des'];
$cat=$_REQUEST['cat'];
$types=$_REQUEST['types'];

$tag=$_REQUEST['tag'];
if($types=="HTML")
{
$query="update `article` set a_name='".$aname."', description='".$des."', hashtag='".$tag."' where article_id=".$id."";
echo $query;
mysqli_query($con,$query);
header("location: allarticle.php");
}
else
{
    $query="update `article` set a_name='".$aname."', description='".$des."', category='".$cat."', hashtag='".$tag."' where article_id=".$id."";
    mysqli_query($con,$query);
    header("location: allarticle.php");
}
?>