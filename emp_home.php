<?php
include"connection.php";
include("employee_header.php");
$id=$_SESSION['emp'];
$query="select * from `employee` where email='".$id."'";
$res=mysqli_query($con,$query);
$row1=mysqli_fetch_array($res);
?><center>
    <h1> WELCOME
        <?php

        echo $_SESSION['emp'];
        ?>
    </h1>
    <table >
        <tr>
            <th><img src="<?php echo $row1[8]; ?>" width="300" height="300" style="border: 1px black groove;"></th>
            <td>
                <span style="font-size: x-large"> <b>Email Id : </b><?php echo $_SESSION['emp']; ?></span>
                <br>
                <span style="font-size: x-large"> <b>User Name : </b><?php echo strtoupper($row1[0])." ".strtoupper($row1[1]) ?></span>
                <br>
                <span style="font-size: x-large"> <b>Contact No. : </b><?php echo $row1[3] ?></span>
                <br>
            </td>
        </tr>

    </table></center><?php include "footer.html" ?>