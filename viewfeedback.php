<?php
include("connection.php");
include("adminheader.php");
$query="select * from feedback";
$res=mysqli_query($con,$query);
if($_SESSION['type']=="super Admin" || $_SESSION['type']=="limited user")
{

    $t="<table border='1'>
<tr>
<th colspan='5'><h2>View Feedback</h2></th>
</tr>
<tr>
<th>
Sr.no
</th><th> Email</th><th>Message</th><th>Type</th><th>Reply</th>
</tr>";
    $count=0;
    while($row=mysqli_fetch_array($res))
    {
        $count++;
        $t=$t."<tr>";
        $t=$t."<td>".$count."</td>";
        $t=$t."<td>".$row[1]."</td>";
        $t=$t."<td>".$row[2]."</td>";
        $t=$t."<td>".$row[3]."</td>";
        $t=$t."<td> <a href='reply.php?q=".$row[0]."'>Reply</a></td>";
        $t=$t."</tr>";
    }
    $t=$t."</table>";
    echo $t;
}
else
{

    $t="<table border='1'>
<tr>
<th colspan='5'><h2>View Feedback</h2></th>
</tr>
<tr>
<th>
Sr.no
</th><th> Email</th><th>Message</th><th>Type</th><th style='display:none;'>Reply</th>
</tr>";
    $count=0;
    while($row=mysqli_fetch_array($res))
    {
        $count++;
        $t=$t."<tr>";
        $t=$t."<td>".$count."</td>";
        $t=$t."<td>".$row[1]."</td>";
        $t=$t."<td>".$row[2]."</td>";
        $t=$t."<td>".$row[3]."</td>";
        $t=$t."<td  style='display:none;'> <a href='reply.php?q=".$row[0]."'>Reply</a></td>";
        $t=$t."</tr>";
    }
    $t=$t."</table>";
    echo $t;
}
?>
<?php include "footer.html";
