<?php
include "connection.php";
$cat=$_REQUEST['q'];
session_start();
$query="select * from article where category='".$cat."'";
//echo $query;
$res=mysqli_query($con,$query);
$row_count=mysqli_num_rows($res);

if($row_count>0)
{
    if($_SESSION['type']=="super Admin")
    {
        ?>
        <table align="center" cellspacing="5" cellpadding="5">
            <tr>
                <th colspan="5">
                    <span style="font-size: xx-large;">LIST OF ARTICLES</span>
                </th>

            </tr>
            <tr>
                <th colspan="5">
                    <hr>
                </th>
            </tr>
            <tr>
                <th>Sr. No. </th>
                <th>Article Name</th>
                <th>Article Type</th>
                <th>Detail</th>
                <th>Delete</th>
            </tr>
            <tr><td colspan="6"><hr></td> </tr>
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
                    <th> <a href="admin_view_article_detail.php?q=<?php echo $row[0]?>" title="Click Here to View Article">View Detail</a></th>
                    <th> <a href="delete_article.php?q=<?php echo $row[0]?>" title="Click Here to delete Article">Delete Article</a></th>

                </tr>
                <tr><td colspan="5"><hr></td></tr>
            <?php
            }
            ?>

        </table>
        <?php
    }
    elseif($_SESSION['type']=="limited user")
    {
       ?>
        <table align="center" cellspacing="5" cellpadding="5">
            <tr>
                <th colspan="5">
                    <span style="font-size: xx-large;">LIST OF ARTICLES</span>
                </th>

            </tr>
            <tr>
                <th colspan="5">
                    <hr>
                </th>
            </tr>
            <tr>
                <th>Sr. No. </th>
                <th>Article Name</th>
                <th>Article Type</th>
                <th>Detail</th>
                <th style="display: none;">Delete</th>
            </tr>
            <tr><td colspan="6"><hr></td> </tr>
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
                    <th> <a href="admin_view_article_detail.php?q=<?php echo $row[0]?>" title="Click Here to View Article">View Detail</a></th>
                    <th style="display: none;"> <a href="delete_article.php?q=<?php echo $row[0]?>" title="Click Here to delete Article">Delete Article</a></th>

                </tr>
                <tr><td colspan="5"><hr></td></tr>
            <?php
            }
            ?>

        </table>
        <?php
    }
    else
    {
        ?>
        <table align="center" cellspacing="5" cellpadding="5">
            <tr>
                <th colspan="5">
                    <span style="font-size: xx-large;">LIST OF ARTICLES</span>
                </th>

            </tr>
            <tr>
                <th colspan="5">
                    <hr>
                </th>
            </tr>
            <tr>
                <th>Sr. No. </th>
                <th>Article Name</th>
                <th>Article Type</th>
                <th style="display: none;">Detail</th>
                <th style="display: none;">Delete</th>
            </tr>
            <tr><td colspan="6"><hr></td> </tr>
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
                    <th style="display: none;"> <a href="admin_view_article_detail.php?q=<?php echo $row[0]?>" title="Click Here to View Article">View Detail</a></th>
                    <th style="display: none;"> <a href="delete_article.php?q=<?php echo $row[0]?>" title="Click Here to delete Article">Delete Article</a></th>

                </tr>
                <tr><td colspan="5"><hr></td></tr>
            <?php
            }
            ?>

        </table>
        <?php
    }
    ?>

<?php
}
else
{ ?>
    <center><h2 style="color: red;">No article (s) posted yet for <b><?php echo strtoupper($cat); ?></b></h2></center>
<?php
}
?>
