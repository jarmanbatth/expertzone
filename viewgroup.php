<?php
include("connection.php");
include("adminheader.php");
$query="select * from `group`";
$res=mysqli_query($con,$query);
$t="<table border='1'>
<tr>
<th colspan='7'><h2>View Groups</h2></th>
</tr>
<tr>
<th>Sr. no</th><th>Group Name</th><th>Article</th><th>Description</th><th>Icon</th><th>Edit</th><th>Delete</th>
</tr>";
$count=0;
while($r=mysqli_fetch_array($res))
{
    $count++;
    $t=$t."<td> $count</td>";
    $t=$t."<td> $r[0]</td>";
    $t=$t."<td> $r[1]</td>";
    $t=$t."<td> $r[2]</td>";
    $t=$t."<td> $r[3]</td>";
    $t=$t."<td> <a href='edit_group.php?q=".$r[0]."'>Edit Group </a></td>";
    $t=$t."<td> <a href='delete_group.php?q=".$r[0]."'>Delete Group</a></td>";
    $t=$t."</tr>";
}
$t=$t."</table>";
echo $t;
?>