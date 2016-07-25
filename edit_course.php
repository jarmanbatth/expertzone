<?php
include("connection.php");
include("adminheader.php");
$cname=$_REQUEST['q'];
$query="select * from `course` where course_name='".$cname."'";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_array($res);
?>
<form action="edit_course_action.php" method="post">
    <table border="1">
        <tr>
            <th colspan="2"> <h2>EDIT COURSE</h2></th>
        </tr>
        <tr>
            <th>Name of Course : </th>
            <th> <input type="text" name="course_name" readonly required value="<?php echo $row[0];?>"></th>
        </tr>
        <tr>
            <td>Description : </td>
            <th> <textarea name="des" value="<?php echo $row[1];?>"required ><?php echo $row[1];?></textarea></th>
        </tr>
        <tr>
            <td>Type of Course : </td>
            <th>
            <select name="course" selected readonly>
                <option value="<?php echo $row[2];?>"><?php echo $row[2];?></option>
            </select>
            </th>
        </tr>
        <tr>
            <td></td>
            <td> <input type="submit" name="sub" value="EDIT COURSE"> </td>
        </tr>
    </table>
</form>
<?php include "footer.html" ?>