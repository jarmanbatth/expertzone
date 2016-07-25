<?php

 include("connection.php");
 include("adminheader.php");
 ?>
<body>
<form action="add_emp_action.php" method="post" ENCTYPE="multipart/form-data">
    <table border="1">
        <tr>
            <th colspan="2"> <h2>ADD EMPLOYEE</h2></th>
        </tr>

        <tr>
            <th>First Name : </th>
            <th> <input type="text" name="fname" required placeholder=" First Name  : "></th>
        </tr>
        <tr>
            <th>Last Name : </th>
            <th> <input type="text" name="lname" required placeholder="Last Name :"></th>
        </tr>
        <tr>
            <th>Email : </th>
            <th> <input type="email" name="email" required placeholder="Email :"></th>
        </tr>

        <tr>
            <th>Mobile No : </th>
            <th> <input type="text" name="mobile" required placeholder="Mobile No : "></th>
        </tr>
        <tr>
            <th>Age : </th>
            <th> <input type="text" name="age" required placeholder="Age :"></th>
        </tr>
        <tr>
            <th>Password : </th>
            <th> <input type="password" name="pass" required placeholder="Password : "></th>
        </tr>
        <tr>
            <th>Confirm password : </th>
            <th> <input type="password" name="cpass" required placeholder="Confirm password : "></th>
        </tr>
        <tr>
            <th>Designation : </th>
            <th>
                <select name="designation" required placeholder="Designation :">
                    <option value="">---Select---</option>
                    <option value="H.O.D">H.O.D</option>
                    <option value="PROFESSOR">PROFESSOR</option>
                    <option value="ASSISTENT PROFESSOR">ASSISTANT PROFESSOR</option>
                    <option value="LECTURER">LECTURER</option>
                </select>
            </th>
        </tr>
        <tr>
            <th> Profile Picture: </th>
            <th> <input type="file" name="file1" required placeholder="Profile Picture: "></th>
        </tr>
        <tr>
            <th>Address : </th>
            <th> <textarea name="address" required placeholder="Address : "></textarea>
        </tr>
        <tr>

            <th>
                <?php
                if(isset($_REQUEST['q'])&& $_REQUEST['q']==1)
                {
                    echo "<span style='color:orange;'> Employee Created Successfully</span>";
                }
                ?>
                <?php
                if(isset($_REQUEST['q'])&& $_REQUEST['q']==2)
                {
                    echo "<span style='color:red;'> Password and confirm password doesnot matches.</span>";
                }
                ?>
                <?php
                if(isset($_REQUEST['q'])&& $_REQUEST['q']==3)
                {
                    echo "<span style='color:red;'> Choose Only image File.</span>";
                }
                ?>
                <?php
                if(isset($_REQUEST['q'])&& $_REQUEST['q']==4)
                {
                    echo "<span style='color:red;'> Email Already Exists.</span>";
                }
                ?>
            </th>
            <th> <input type="submit" name="sub" value="ADD EMPLOYEE"> </th>
        </tr>
    </table>
</form>
<?php
include("footer.html");
?>
</body>