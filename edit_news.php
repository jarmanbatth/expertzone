<?php
include("connection.php");
$newsid=$_REQUEST['q'];
$query="select * from news where newsid='".$newsid."'";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_array($res);
include "adminheader.php";
?>
<form action="edit_news_action.php" method="post">
    <table border="1">
        <tr>
            <th colspan="2"> <h2>Edit News Detail</h2></th>
        </tr>

            <input type="hidden" name="id" required value="<?php echo $row[0]?>">

        <tr>
            <th> Title : </th>
            <td> <input type="text" name="title" required value="<?php echo $row[1]?>"></td>
        </tr>
        <tr><th>Description</th>
            <td><textarea name="des" value="<?php echo $row[2]?>"><?php echo $row[2]?></textarea></td>
        </tr>
        <tr>
            <th>Email : </th>
            <td> <input type="email" name="email" required readonly value="<?php echo $row[3]?>"></td>
        </tr>
        <tr>
            <th></th>
            <th> <input type="submit" value="Update"> </th>
        </tr>
    </table>
</form>
<?php
include("footer.html");
?>
