<?php
include("connection.php");
include("adminheader.php");
$query="select * from uac";
$res=mysqli_query($con,$query);
$t="<table border='1'>
<tr>
<th>Sr. no</th><th>Category</th><th>Description</th>
</tr>";
$count=0;
while($row=mysqli_fetch_array($res))
{
    $count++;
    $t=$t."<td> $count</td>";
    $t=$t."<td> $row[0]</td>";
    $t=$t."<td> $row[1]</td>";
    $t=$t."</tr>";
}
$t=$t."</table>";
echo $t;
?>
