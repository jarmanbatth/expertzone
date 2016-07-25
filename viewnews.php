<?php
include("connection.php");
include("adminheader.php");
$query="select * from news";
$res=mysqli_query($con,$query);
if($_SESSION['type']=="super Admin")
{

    $t="<table border='1'>
<tr>
<th colspan='5'><h2>View News</h2></th>
</tr>
<tr>
<th>Sr. no</th><th>Title of News</th><th>Description</th><th>Edit</th><th>Delete</th>
</tr>";
    $count=0;
    while($row=mysqli_fetch_array($res))
    {
        $count++;
        $t=$t."<td> $count</td>";
        $t=$t."<td> $row[1]</td>";
        $t=$t."<td> $row[2]</td>";
        $t=$t."<td> <a href='edit_news.php?q=".$row[0]."'>Edit News </a></td>";
        $t=$t."<td> <a href='delete_news.php?q=".$row[0]."'>Delete News</a></td>";
        $t=$t."</tr>";
    }
    $t=$t."</table>";
    echo $t;
}
elseif($_SESSION['type']=='limited user')
{

    $t="<table border='1'>
<tr>
<th colspan='5'><h2>View News</h2></th>
</tr>
<tr>
<th>Sr. no</th><th>Title of News</th><th>Description</th><th>Edit</th><th style='display:none;'>Delete</th>
</tr>";
    $count=0;
    while($row=mysqli_fetch_array($res))
    {
        $count++;
        $t=$t."<td> $count</td>";
        $t=$t."<td> $row[1]</td>";
        $t=$t."<td> $row[2]</td>";
        $t=$t."<td> <a href='edit_news.php?q=".$row[0]."'>Edit News </a></td>";
        $t=$t."<td style='display:none;'> <a href='delete_news.php?q=".$row[0]."'>Delete News</a></td>";
        $t=$t."</tr>";
    }
    $t=$t."</table>";
    echo $t;
}
else
{

    $t="<table border='1'>
<tr>
<th colspan='5'><h2>View News</h2></th>
</tr>
<tr>
<th>Sr. no</th><th>Title of News</th><th>Description</th><th style='display:none;'>Edit</th><th style='display:none;'>Delete</th>
</tr>";
    $count=0;
    while($row=mysqli_fetch_array($res))
    {
        $count++;
        $t=$t."<td> $count</td>";
        $t=$t."<td> $row[1]</td>";
        $t=$t."<td> $row[2]</td>";
        $t=$t."<td style='display:none;'> <a href='edit_news.php?q=".$row[0]."'>Edit News </a></td>";
        $t=$t."<td style='display:none;'> <a href='delete_news.php?q=".$row[0]."'>Delete News</a></td>";
        $t=$t."</tr>";
    }
    $t=$t."</table>";
    echo $t;
}
?>
<?php include "footer.html";
