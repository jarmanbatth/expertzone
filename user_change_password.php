<?php

include("connection.php");
include("user_header.php");
?>
<form action="user_change_password_action.php" method="post">
    <table border="1">
        <tr>
            <th colspan="2"> <h2>CHANGE PASSWORD</h2></th>
        </tr>
        <tr>
            <th>Email : </th>
            <td> <input type="email" name="mail" readonly value="<?php echo $_SESSION['user']?>"></td>
        </tr>
        <tr>
            <td> Old Password : </td>
            <td> <input type="password" name="opass" required placeholder="Old Password"></td>
        </tr>
        <tr>
            <td> New Password : </td>
            <td> <input type="password" name="npass" required placeholder="New Password"></td>
        </tr>
        <tr>
            <td>Confirm password : </td>
            <td> <input type="password" name="cpass" required placeholder="Confirm Password"></td>
        </tr>
        <tr>
            <td>
                <?php
                if(isset($_REQUEST['q'])&& $_REQUEST['q']==13)
                {
                    echo "<span style='color:red;'>Password and confirm password doesnot matches. </span>";
                }
                ?>
                <?php
                if(isset($_REQUEST['q'])&& $_REQUEST['q']==14)
                {
                    echo "<span style='color:red;'> Email and Password doesn't match. </span>";
                }
                ?>
            </td>
            <td> <input type="submit" name="sub" value="Change Password"> </td>
        </tr>
    </table>
</form>
<?php include "footer.html" ?>