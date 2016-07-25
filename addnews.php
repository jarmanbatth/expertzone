<?php
include("connection.php");
include("adminheader.php");
?>
<form action="addnewsaction.php" method="post">
    <table border="1">
        <tr>
            <th colspan="2"> <h2>ADD NEWS</h2></th>
        </tr>
        <tr>
            <th>Title of News : </th>
            <th> <input type="text" name="title" required placeholder="News Title" ></th>
        </tr>
        <tr>
            <th>Description : </th>
            <th> <input type="text" name="des" required placeholder="Give Description"></th>
        </tr>
        <tr>
            <th>Email : </th>
            <th> <input type="text" name="email" readonly required value="<?php echo $_SESSION['admin'];?>"></th>
        </tr>
        <tr>
            <th>        </th>
            <th> <input type="submit" name="sub" value="ADD NEWS"> </th>
        </tr>
    </table>
</form>
<?php
include("footer.html");
?>
