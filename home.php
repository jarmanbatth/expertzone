<?php
include("adminheader.php");
include("connection.php");
$email=$_SESSION['admin'];
$query="select * from `admin` where email='".$_SESSION['admin']."'";
$res=mysqli_query($con,$query);
$row1=mysqli_fetch_array($res);
?><center>
    <h1> WELCOME
    </h1>
    <table >
        <tr>
            <th><img src="1.jpg" width="300" height="150" style="border: 1px black groove;"></th>
            <td>
                <span style="font-size: x-large"> <b>Email Id : </b><?php echo $_SESSION['admin']; ?></span>
                <br>
                <span style="font-size: x-large"> <b>Name : </b><?php echo strtoupper($row1[2])." ".strtoupper($row1[3]) ?></span>
                <br>
                <span style="font-size: x-large"> <b>Category : </b><?php echo $row1[4] ?></span>
                <br>
            </td>
        </tr>

    </table>
</center>
<?php include "footer.html";