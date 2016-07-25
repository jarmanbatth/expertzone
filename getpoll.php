<?php
include"connection.php";
$op=$_GET["q"];
$r="select * from poll";
$result=mysqli_query($con,$r);
$row=mysqli_fetch_array($result);
if($op==1)
{
    $yes=$row[0];
    $yes++;
    $query="update poll set yes=".$yes;
}
else if($op==2)
{
    $no=$row[1];
    $no++;

    $query="update poll set no=".$no;
}
else if($op==3)
{
    $cant=$row[2];
    $cant++;
    $query="update poll set cant=".$cant;
}

if(isset($_COOKIE["poll"]))
{
    echo "<br> You cannot poll twice<br>";
}
else
{
    mysqli_query($con,$query);
    setcookie("poll",1,time()+86000);
}

$qt="select yes+no+not_yet from poll";


$result=mysqli_query($con,$qt);

$row=mysqli_fetch_array($result);

$total=$row[0];
echo "<br>"."Total Votes are ".$row[0];


$t="select * from poll";



$result=mysqli_query($con,$t);

$row=mysqli_fetch_array($result);
$y=$row[0]/$total*100;
$n=$row[1]/$total*100;
$cant=$row[2]/$total*100;
echo '<div style=" color: white  ; background-color: red;width: '.$y.'px ">
&nbsp;
</div></th><td>Thanks for liking</td></tr>
<tr>
<tr><th><br></th></tr>
<th>
<div style="text-align:left;color: white ; background-color: blue;width: '.$n.'px">
&nbsp;
</div></th><td>Please give us some suggestion by feedback</td></tr><tr><th><br></th></tr>
<tr><th>
<div style=" color: white  ; background-color: green;width: '.$cant.'px">
&nbsp;
</div></th><td>Please Visit Again...</td></tr></table>';

























