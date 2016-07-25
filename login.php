<?php
include("connection.php");
include("public_header.php");
session_start();
?><center>
<form action="authenticate.php" method="post">
    <?php
    if(isset($_REQUEST['q'])&&$_REQUEST['q']==0)
    {
        echo "<span style='color:darkorange;'> Feedback Sent</span>";
    }
    elseif(isset($_REQUEST['q'])&&$_REQUEST['q']==10)
    {
        echo "<span style='color:green;'> Account Created Successfully</span>";
    }
    ?>
    <table border="1" >
        <tr>
            <th colspan="2"><h2>ADMIN LOGIN </h2></th>
        </tr>
        <tr>
            <th>Email</th>
            <th><input type="email" name="mail" required> </th>
        </tr>
        <tr>
            <th>Password</th>
            <th><input type="password" name="pass" required> </th>
        </tr>
        <tr>
            <th>Select User Type</th>
            <th>
                <select name="category" required>
                    <option value="">---Select---</option>
                    <?php
                    $query="select * from uac order by category desc";
                    $res=mysqli_query($con,$query);
                    while($row=mysqli_fetch_array($res))
                    { ?>
                        <option value="<?php echo $row[0] ?>"><?php echo $row[0] ?></option>
                    <?php   }
                    ?>
                </select>
            </th>
        </tr>
        <tr>
            <th>
                <?php
               if(isset($_REQUEST['q']) && $_REQUEST['q']==3)
               {
                   echo"<span style='color:red;'>Incorrect Email or Password</span>";
               }
                ?>
            </th>
            <th>
                <input type="submit" value="LOGIN">
            </th>
        </tr>
    </table>
</form>
</center>
<?php include "footer.html" ?>