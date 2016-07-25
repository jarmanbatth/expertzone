<?php
include("connection.php");
$mail=$_REQUEST['q'];
$query="select * from admin where email='".$mail."'";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_array($res);
include "adminheader.php";
?>
<form action="edit_admin_action.php" method="post">
    <table border="1">
        <tr>
            <th colspan="2"> <h2>Edit Admin Detail</h2></th>
        </tr>
        <tr>
            <th>First Name : </th>
            <th> <input type="text" name="fname" required readonly value="<?php echo $row[2]?>"></th>
        </tr>
        <tr>
            <th>Last Name : </th>
            <th> <input type="text" name="lname" required readonly value="<?php echo $row[3]?>"></th>
        </tr>
        <tr>
            <th>Email : </th>
            <th> <input type="email" name="email" required readonly value="<?php echo $row[0]?>"></th>
        </tr>
        <tr>
            <th>Category : </th>
            <th>
                <select name="category" required>

                    <?php
                    $query1="select * from uac";
                    $res1=mysqli_query($con,$query1);
                    while($row1=mysqli_fetch_array($res1))
                    {
                        if($row[4]==$row1[0])
                        {
                        ?>
                        <option value="<?php echo $row1[0] ?>" selected><?php echo $row1[0] ?></option>
                    <?php   }
                    else
                    { ?>
                        <option value="<?php echo $row1[0] ?>" selected><?php echo $row1[0] ?></option>
                  <?php  }
                    }
                    ?>
                </select>
            </th>
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
