<?php
include "connection.php";
$cat=$_REQUEST['q'];
$query="select * from article where category='".$cat."'";
//echo $query;
$res=mysqli_query($con,$query);
$row_count=mysqli_num_rows($res);
if($row_count>0)
{ ?>
    <table align="center" >
        <tr>
            <th colspan="4">
                <span style="font-size: xx-large;">LIST OF ARTICLES</span>
            </th>

        </tr>
        <tr>
            <th colspan="4">
                <hr>
            </th>
        </tr>
        <tr>
            <th>Sr. No. </th>
            <th>Article Name</th>
            <th>Article Type</th>
            <th>Detail</th>
        </tr>
        <tr><td colspan="4"><hr></td> </tr>
        <?php
        $count=0;
        while($row=mysqli_fetch_array($res))
        {
            $count++;
            ?>
            <tr align="center">
                <td> <?php echo $count ?></td>
                <td> <?php echo $row[1]?></td>
                <td> <?php echo $row[4]?></td>
                <th> <a href="user_view_article_detail.php?q=<?php echo $row[0]?>" title="Click Here to View Article">View Detail</a></th>
            </tr>
            <tr><td colspan="4"><hr></td></tr>
        <?php
        }
        ?>

    </table>
<?php
}
else
{ ?>
    <center><h2 style="color: red;">No article (s) posted yet for <b><?php echo strtoupper($cat); ?></b></h2></center>
<?php
}
?>
