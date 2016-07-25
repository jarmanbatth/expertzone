<?php
$feedback_id=$_REQUEST['q'];
include "adminheader.php";
include "connection.php";
$query="select * from feedback where feedbackid=$feedback_id";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_array($res);
$email=$row[1];
?>
<form action="reply_action.php" method="post">
    <input type="hidden" name="id" value="<?php echo $feedback_id ?>">
    <table border="1" align="center">
    <tr>
        <th colspan="2"><h2>REPLY</h2></th>
    </tr>
    <tr>
        <th>Reply to :</th>
        <th> <?php echo $email ?> </th>
    </tr>
        <tr>
            <th>Message :</th>
            <th>
                <textarea rows="6" cols="22" name="msg" required></textarea>
            </th>
        </tr>
        <tr>
            <th></th>
            <th><input type="submit" value="SEND"> </th>
        </tr>
    </table>
</form>
<?php include "footer.html";