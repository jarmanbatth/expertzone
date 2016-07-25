<?php
include("connection.php");
include("adminheader.php");
$query="select * from `employee` ";
$res=mysqli_query($con,$query);
$t="<table border='1'>
<tr>
<th colspan='10'><h2>View Employees</h2></th>
</tr>
<tr>
<th>Sr. no</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone</th><th>Age</th><th>Emp_ID</th><th>Designation</th><th>Profile</th><th>Address</th>
</tr>";
$count=0;
while($row=mysqli_fetch_array($res))
{
    $count++;
    $t=$t."<tr align='center'>";
    $t=$t."<td>$count</td>";
    $t=$t."<td>$row[0]</td>";
    $t=$t."<td>$row[1]</td>";
    $t=$t."<td>$row[2]</td>";
    $t=$t."<td>$row[3]</td>";
    $t=$t."<td>$row[5]</td>";
    $t=$t."<td>$row[6]</td>";
    $t=$t."<td>$row[7]</td>";
    $t=$t."<td><img src='$row[8]' height='100px' width='100px'></td>";
    $t=$t."<td>$row[9]</td>";
    //$t=$t."<td> <a href='edit_admin.php?q=".$row[0]."'>Edit</a></td>";
    ///$t=$t."<td> <a href='delete_admin.php?q=".$row[0]."'>Delete</a></td>";
    $t=$t."</tr>";
}
$t=$t."</table>";
echo $t;
?>
<?php include "footer.html" ?>