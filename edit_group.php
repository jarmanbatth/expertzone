<?php
include("connection.php");
$gname=$_REQUEST['q'];
$query="select * from `group` where group_name='".$gname."'";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_array($res);
include "adminheader.php";
?>
<form action="edit_group_action.php" method="post">
    <table border="1">
        <tr>
            <th colspan="2"> <h2>Edit group Detail</h2></th>
        </tr>

        <input type="hidden" name="id" required value="<?php echo $row[0]?>">

        <tr>
            <th> Group Name : </th>
            <th> <input type="text" name="gname" readonly required value="<?php echo $row[0]?>"></th>
        </tr>
        <tr>
            <th> Article cOUNT : </th>
            <th> <input type="text" name="ac" required value="<?php echo $row[1]?>"></th>
        </tr>
        <tr><th>Description</th>
            <th><textarea name="des" value="<?php echo $row[2]?>"></textarea></th>
        </tr>
        <tr>
            <th>Icon : </th>
            <th> <input type="file" name="icon" required value="<?php echo $row[3]?>"></th>
        </tr>
        <tr>
            <th></th>
            <th> <input type="submit" value="Update"> </th>
        </tr>
    </table>
</form>
<?php
include("adminfooter.php");
?>
