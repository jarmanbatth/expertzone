<?php
include("connection.php");
include("adminheader.php");
if(isset($_REQUEST['q']) && $_REQUEST['q']==1)
{
    echo "<span style='color: red;'>Course Deleted. </span>";
}
$query="select * from `course`";
$res=mysqli_query($con,$query);
if($_SESSION['type']=="super Admin")
{

    $t="<table border='1'>
<tr> <th colspan='6'> <h2> View Courses </h2></th></tr>
<tr>
<th>Sr. no</th><th>Course</th><th>Description</th><th>Type</th><th>Edit</th><th>Delete</th>
</tr>";
    $count=0;
    while($row=mysqli_fetch_array($res))
    {
        $count++;
        $t=$t."<td> $count</td>";
        $t=$t."<td> $row[0]</td>";
        $t=$t."<td> $row[1]</td>";
        $t=$t."<td> $row[2]</td>";
        $t=$t."<td> <a href='edit_course.php?q=".$row[0]."'>Edit</a></td>";
        $t=$t."<td> <a href='delete_course.php?q=".$row[0]."'>Delete</a></td>";
        $t=$t."</tr>";
    }
    $t=$t."</table>";
    echo $t;

}
elseif($_SESSION['type']=="limited user")
{

    $t="<table border='1'>
<tr> <th colspan='6'> <h2> View Courses </h2></th></tr>
<tr>
<th>Sr. no</th><th>Course</th><th>Description</th><th>Type</th><th>Edit</th><th style='display:none;'>Delete</th>
</tr>";
    $count=0;
    while($row=mysqli_fetch_array($res))
    {
        $count++;
        $t=$t."<td> $count</td>";
        $t=$t."<td> $row[0]</td>";
        $t=$t."<td> $row[1]</td>";
        $t=$t."<td> $row[2]</td>";
        $t=$t."<td> <a href='edit_course.php?q=".$row[0]."'>Edit</a></td>";
        $t=$t."<td style='display:none;'> <a href='delete_course.php?q=".$row[0]."'>Delete</a></td>";
        $t=$t."</tr>";
    }
    $t=$t."</table>";
    echo $t;

}
else
{

    $t="<table border='1'>
<tr> <th colspan='6'> <h2> View Courses </h2></th></tr>
<tr>
<th>Sr. no</th><th>Course</th><th>Description</th><th>Type</th><th style='display: none;'>Edit</th><th style='display: none;'>Delete</th>
</tr>";
    $count=0;
    while($row=mysqli_fetch_array($res))
    {
        $count++;
        $t=$t."<td> $count</td>";
        $t=$t."<td> $row[0]</td>";
        $t=$t."<td> $row[1]</td>";
        $t=$t."<td> $row[2]</td>";
        $t=$t."<td style='display: none;'> <a href='edit_course.php?q=".$row[0]."'>Edit</a></td>";
        $t=$t."<td style='display: none;'> <a href='delete_course.php?q=".$row[0]."'>Delete</a></td>";
        $t=$t."</tr>";
    }
    $t=$t."</table>";
    echo $t;
}
?>
<?php include "footer.html" ?>