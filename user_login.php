<?php
include"connection.php" ;
include "public_header.php";
session_start();
?>
<form action="user_login_action.php" method="post">

    <table border="1" >
        <tr>
            <th colspan="2"><h2>LOGIN</h2></th>
        </tr>
        <tr>
            <th>Email</th>
            <th><input type="email" name="email" required> </th>
        </tr>
        <tr>
            <th>Password</th>
            <th><input type="password" name="pass" required> </th>
        </tr>
        <tr>
            <th>
                <?php
                if(isset($_REQUEST['q']) && $_REQUEST['q']==12)
                {
                    echo"<span style='color:red;'>Incorrect Email or Password</span>";
                }
                ?>

                <a href="recover_pass_public.php">Recover Password</a>

            </th>
            <th>
                <input type="submit" value="LOGIN">
            </th>
        </tr>
    </table>

</form>
<?php
include("footer.html");
?>