<?php
include("connection.php");
include("public_header.php");
?>
<form action="signup_action.php" method="post" enctype="multipart/form-data">
    <table border="1">
        <tr>
            <th colspan="2"> <h2>Create My Account</h2></th>
        </tr>
        <tr>
            <th>First Name : </th>
            <th> <input type="text" name="fname" required placeholder="First Name"></th>
        </tr>
        <tr>
            <th>Last Name : </th>
            <th> <input type="text" name="lname" required placeholder="Last Name"></th>
        </tr>
        <tr>
            <th>Email : </th>
            <th> <input type="email" name="email" required placeholder="Email-ID"></th>
        </tr>
        <tr>
            <th>Password : </th>
            <th> <input type="password" name="pass" required placeholder="Password"></th>
        </tr>
        <tr>
            <th>Confirm password : </th>
            <th> <input type="password" name="cpass" required placeholder="Confirm Password"></th>
        </tr>
        <tr>
            <th>Mobile No : </th>
            <th>
                <input type="text" name="mobile" maxlength="10" placeholder="Phone">
            </th>
        </tr>
        <tr>
            <th>Choose Profile Picture : </th>
            <th>
                <input type="file" name="file1" required>
            </th>
        </tr>
        <tr>
            <th>Select Security Question : </th>
            <th>
                <select name="que" required>
                    <option value="">--------Select--------</option>
                    <option value="Your School Name?">Your School Name</option>
                    <option value="Your Nick Name?">Your Nick Name</option>
                    <option value="First hill Station Visit Name?">First hill Station Visit Name?</option>
                </select>
            </th>
        </tr>
        <tr>
            <th> Security Answer: </th>
            <th>
                <input type="text" name="ans" required placeholder="Give Answer">
            </th>
        </tr>
        <tr>
            <th><img id="captcha" src="securimage_show.php" alt="CAPTCHA Image" /></th>
            <th><input type="text" name="cap" size="10" maxlength="6" />
                <a href="#" onclick="document.getElementById('captcha').src = 'securimage_show.php?' + Math.random(); return false"><img src="refresh.png" height="40" width="40"></a>
            </th>
        </tr>
        <tr>
            <th><?php
            if(isset($_REQUEST['q'])&&$_REQUEST['q']==11)
            {
                echo "<span style='color: red;'>Password and confirm password doesnot match.</span>";
            }
                if(isset($_REQUEST['q'])&&$_REQUEST['q']==1)
                {
                    echo "<span style='color: #ff0000'>The Security code entered is incorrect</span>";
                }
                ?>

                <?php
                if(isset($_REQUEST['q'])&&$_REQUEST['q']==16)
                {
                    echo "<span style='color: red;'>Choose image only.</span>";
                }
                ?></th>
            <th> <input type="submit" name="sub" value="create account"> </th>
        </tr>
    </table>
</form>
<?php
include("footer.html");
?>

