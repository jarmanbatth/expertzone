<?php
include "public_header.php";
?>
<form action="recover_pass_action_public.php" method="post">
    <table border="1" align="center">
        <tr>
            <th colspan="2"><h2>RECOVER PASSWORD FOR PUBLIC</h2></th>
        </tr>
        <tr>
            <th>Enter Email : </th>
            <th>
                <input type="email" name="email" required placeholder="Enter your E-Mail ID">
            </th>
        </tr>
        <tr>
            <th><?php
            if(isset($_REQUEST['q']) && $_REQUEST['q']==1)
            {
                echo "<span style='color:red'>Email Id doesn't Exists</span>";
            }
                ?></th>
            <th>
                <input type="submit" value="RECOVER">
            </th>
        </tr>
    </table>
</form>
<?php include"footer.html" ?>