 <?php
 include("connection.php");
 include("adminheader.php");
 ?>
 <form action="addadminaction.php" method="post">
     <table border="1">
         <tr>
             <th colspan="2"> <h2>ADD ADMIN</h2></th>
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
             <th> <input type="email" name="email" required placeholder="Email"></th>
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
             <th>Category : </th>
             <th>
                 <select name="category" required>
                     <option value="">---Select---</option>
                     <?php
                     $query="select * from uac";
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
                 if(isset($_REQUEST['q'])&& $_REQUEST['q']==1)
                 {
                     echo "<span style='color:red;'> Email Already Exists</span>";
                 }
                 ?>
                 <?php
                 if(isset($_REQUEST['q'])&& $_REQUEST['q']==2)
                 {
                     echo "<span style='color:red;'> Password and confirm password doesnot matches.</span>";
                 }
                 ?>
             </th>
             <th> <input type="submit" name="sub" value="ADD ADMIN"> </th>
         </tr>
     </table>
 </form>
 <?php
 include("footer.html");
 ?>
