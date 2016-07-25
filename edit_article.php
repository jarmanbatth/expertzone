<?php
include("connection.php");
include("employee_header.php");
$article_id=$_REQUEST['q'];
$query="select * from `article` where article_id=".$article_id."";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_array($res);
?>
    <form action="edit_article_action.php" method="post" >
        <table border="1" align="center">
            <tr>
                <th colspan="2"> <h2>Edit Posted article</h2></th>
            </tr>
            <input type="hidden" name="id" value="<?php echo $row[0];?> ">
            <tr>
                <th>Article Name : </th>
                <th> <input type="text" name="aname" required value="<?php echo $row[1]?>"></th>
            </tr>
            <tr>
                <th>Description: </th>
                <th> <textarea name="des" value="<?php echo $row[2]?>"><?php echo $row[2]?></textarea>
            </tr>

            <tr>
                <th>Select category: </th>
                <th>
                    <select name="cat" required>

                        <?php
                        $query="select * from `category`";
                        $res1=mysqli_query($con,$query);
                        while($row1=mysqli_fetch_array($res1))
                        {
                        if($row[3]==$row1[0])
                        {
                            ?>
                            <option value="<?php echo $row1[0] ?>" selected><?php echo $row1[0] ?></option>
                        <?php   }
                        else
                        { ?>
                        <option value="<?php echo $row1[0] ?>" ><?php echo $row1[0] ?></option>
                        <?php  }
                        }?>



                    </select>
                </th>
            </tr>
            <tr>
                <th> Types of Steps : </th>
                <th><input type="text" name="types" readonly value="<?php echo $row[4];?>">
                </th>
            </tr>
            <?php
            if($row[4]=="HTML")
            {

            }
            else
            {?>
            <tr>
                <th> Number of Steps :</th>
                <th><input type="text" name="steps" value="<?php echo $row[5]?>" readonly> </th>
            </tr>
            <?php  }?>

            <tr>
                <th> Hash Tags: </th>
                <th>
                    <input type="text" name="tag" required value="<?php echo $row[6]?>">
                </th>
            </tr>
            <tr>
                <th> Author Email: </th>
                <th>
                    <input type="email" name="email" required readonly value="<?php echo $_SESSION['emp'];?>">
                </th>
            </tr>
            <tr>
                <th>  </th>
                <th>
                    <input type="submit" value="EDIT ARTICLE" >
                </th>
            </tr>

        </table>
    </form>
<?php include "footer.html"; ?>