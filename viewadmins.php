<?php
include("connection.php");
include("adminheader.php");
$query="select * from admin";
$res=mysqli_query($con,$query);
if($_SESSION['type']=="super Admin")
{
    $t="<table border='1'>
<tr>
<th colspan='7'><h2>View Admins</h2></th>
</tr>
<tr>
<th>Sr. no</th><th>Email</th><th>First Name</th><th>Last Name</th><th>Category</th><th>Edit</th><th>Delete</th>
</tr>";
    $count=0;
    while($row=mysqli_fetch_array($res))
    {
        $count++;
        $t=$t."<tr>";
        $t=$t."<td>$count</td>";
        $t=$t."<td>$row[0]</td>";
        $t=$t."<td>$row[2]</td>";
        $t=$t."<td>$row[3]</td>";
        $t=$t."<td>$row[4]</td>";
        $t=$t."<td> <a href='edit_admin.php?q=".$row[0]."'>Edit</a></td>";
        $t=$t."<td> <a href='delete_admin.php?q=".$row[0]."'>Delete</a></td>";
        $t=$t."</tr>";
    }
    $t=$t."</table>";
    echo $t;

}
elseif($_SESSION['type']=="limited user")
{
$t="<table border='1'>
<tr>
<th colspan='7'><h2>View Admins</h2></th>
</tr>
<tr>
<th>Sr. no</th><th>Email</th><th>First Name</th><th>Last Name</th><th>Category</th><th>Edit</th><th style='display:none;>Delete</th>
</tr>";
$count=0;
while($row=mysqli_fetch_array($res))
{
    $count++;
    $t=$t."<tr>";
    $t=$t."<td>$count</td>";
    $t=$t."<td>$row[0]</td>";
    $t=$t."<td>$row[2]</td>";
    $t=$t."<td>$row[3]</td>";
    $t=$t."<td>$row[4]</td>";
    $t=$t."<td> <a href='edit_admin.php?q=".$row[0]."'>Edit</a></td>";
    $t=$t."<td> <a href='delete_admin.php?q=".$row[0]."' style='display:none;'>Delete</a></td>";
    $t=$t."</tr>";
}
$t=$t."</table>";
echo $t;

}
else
{
$t="<table border='1'>
    <tr>
        <th colspan='7'><h2>View Admins</h2></th>
    </tr>
    <tr>
        <th>Sr. no</th><th>Email</th><th>First Name</th><th>Last Name</th><th>Category</th><th style='display:none;'>Edit</th>
        <th style='display:none;'>Delete</th>
    </tr>";
    $count=0;
    while($row=mysqli_fetch_array($res))
    {
    $count++;
    $t=$t."<tr>";
        $t=$t."<td>$count</td>";
        $t=$t."<td>$row[0]</td>";
        $t=$t."<td>$row[2]</td>";
        $t=$t."<td>$row[3]</td>";
        $t=$t."<td>$row[4]</td>";
        $t=$t."<td style='display:none;'> <a href='edit_admin.php?q=".$row[0]."'>Edit</a></td>";
        $t=$t."<td style='display:none;'> <a href='delete_admin.php?q=".$row[0]."'>Delete</a></td>";
        $t=$t."</tr>";
    }
    $t=$t."</table>";
echo $t;

}
include "footer.html" ;