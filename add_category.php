<?php
include("connection.php");
include("adminheader.php");
?>
<form action="add_category_action.php" method="post">
    <table border="1">
        <tr>
            <th colspan="2"> <h2>ADD SUBJECT</h2></th>
        </tr>
        <tr>
            <th>Name of Subject : </th>
            <th> <input type="text" name="cat_name" required placeholder="Subject Name"></th>
        </tr>
        <tr>
            <th>Description : </th>
            <th> <textarea name="des" required placeholder="Give Description"></textarea></th>
        </tr>
        <tr>
            <th>Select Course: </th>
            <th>
                <select name="course" required>
                    <option value="">--------Select--------</option>
                    <?php
                    $query="select * from `course`";
                    $res=mysqli_query($con,$query);
                    while($row=mysqli_fetch_array($res))
                    {?>
                        <option value="<?php echo $row[0];?>"><?php echo $row[0];?></option>
                    <?php
                    }
                    ?>
                </select>
            </th>
        </tr>
        <tr>
            <td>
            <?php
            if(isset($_REQUEST['q']) && $_REQUEST['q']==1)
            {
                echo "<span style='color: red;'>Category Name already Exists. </span>";
            }
            ?></td>
            <td> <input type="submit" name="sub" value="ADD CATEGORY"> </td>
        </tr>
    </table>
</form>
<?php include "footer.html";