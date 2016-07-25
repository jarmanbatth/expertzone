<?php
include"connection.php" ;
include "public_header.php";
session_start();
?>
<form action="emp_login_action.php" method="post">

    <table border="1" >
        <tr>
            <th colspan="2"><h2>EMPLOYEE LOGIN</h2></th>
        </tr>
        <tr>
            <th>Email</th>
            <th><input type="email" name="email" required placeholder="Email-ID"> </th>
        </tr>
        <tr>
            <th>Password</th>
            <th><input type="password" name="pass" required placeholder="PassWord"> </th>
        </tr>
        <tr>
            <th><a href="recover_pass_employee.php">Recover Password</a>
                            <?php
                if(isset($_REQUEST['q']) && $_REQUEST['q']==1)
                {
                    echo"<span style='color:red;'>Incorrect Email or Password</span>";
                }
                if(isset($_REQUEST['q']) && $_REQUEST['q']==4)
                {
                    echo"<span style='color:red;'>password change relogin</span>";
                }
                ?>

            </th>
            <th>
                <input type="submit" value="LOGIN">
            </th>
        </tr>
    </table>
   </form>
<?php include "footer.html" ?>