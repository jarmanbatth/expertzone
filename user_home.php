<?php
include("connection.php");
include("user_header.php");
$email=$_SESSION['user'];
$query="select * from `signup` where email='".$_SESSION['user']."'";
$res=mysqli_query($con,$query);
$row1=mysqli_fetch_array($res);
?>
<h1>WELCOME : </h1>

    <table >
        <tr>
            <th><img src="<?php echo $row1[7]; ?>" width="300" height="300" style="border: 1px black groove;"></th>
            <td>
                <span style="font-size: x-large"> <b>Email Id : </b><?php echo $_SESSION['user']; ?></span>
                <br>
                <span style="font-size: x-large"> <b>User Name : </b><?php echo strtoupper($row1[0])." ".strtoupper($row1[1]) ?></span>
            <br>
                <span style="font-size: x-large"> <b>Contact No. : </b><?php echo $row1[4] ?></span>
                <br>
            </td>
        </tr>

    </table>
<?php

include "footer.html";
?>

