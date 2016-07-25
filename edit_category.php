<?php
include("connection.php");
include("adminheader.php");
$cname=$_REQUEST['q'];
$query="select * from `category` where category='".$cname."'";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_array($res);
?>
<form action="edit_category_action.php" method="post">
    <table border="1">
        <tr>
            <th colspan="2"> <h2>EDIT CATEGORY</h2></th>
        </tr>
        <tr>
            <th>Name of Category : </th>
            <th> <input type="text" name="cat_name" required readonly value="<?php echo $row[0];?>"></th>
        </tr>
        <tr>
            <th>Description : </th>
            <th> <textarea name="des" value="<?php echo $row[1];?>"required ><?php echo $row[1];?></textarea></th>
        </tr>
        <tr>
            <th> Course : </th>
            <th>
                <select name="course" selected readonly>
                    <option value="<?php echo $row[2];?>"><?php echo $row[2];?></option>
                </select>
            </th>
        </tr>
        <tr>
            <th></th>
            <th> <input type="submit" name="sub" value="EDIT CATEGORY"> </th>
        </tr>
    </table>
</form>
<?php include "footer.html";