<?php
include"connection.php";
include"employee_header.php";
$article_id=$_REQUEST['q'];
$query1="select * from `article` where article_id=".$article_id."";
$res1=mysqli_query($con,$query1);
$row1=mysqli_fetch_array($res1);
$flag=0;
if($row1[4]=="HTML")
{
    $flag=1;
}
if($flag==1)
{
    $query="select (description,html_data) from `steps` where id=".$article_id."";
    $res=mysqli_query($con,$query);
    echo $query;
    $t="<table border='1'>
    <tr>
    <th> Step no</th><th>Description</th>
    </tr>";
    $count=0;
    while($row=mysqli_fetch_array($res))
    {
        $count++;
        $t=$t."<tr>";
        $t=$t."<td> $count </td>";
        $t=$t."<td> $row[0]</td>";
        //$t=$t."<td> $row[1]</td>";
        $t=$t."</tr>";
    }
    $t=$t."</table>";
    echo $t;
}
else
{
    $query="select (description,image) from `steps` where id=".$article_id."";
    echo $query;
   $res=mysqli_query($con,$query);

    $t="<table border='1'>
    <tr>
    <th> Step no</th><th>Description</th><th>Video</th><th>Audio</th><th>Image</th>
    </tr>";
    $count=0;
  while($row=mysqli_fetch_array($res))
    {
        $count++;
        $t=$t."<tr>";
        $t=$t."<td> $count </td>";
        $t=$t."<td> $row[1]</td>";
        //$t=$t."<td> $row[2]</td>";
       // $t=$t."<td> $row[3]</td>";
        $t=$t."<td> $row[2]</td>";
        $t=$t."</tr>";
    }
    $t=$t."</table>";
    echo $t;
}
?>