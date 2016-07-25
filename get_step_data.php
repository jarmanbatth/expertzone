<?php
$article=$_REQUEST['a'];
$step_no=$_REQUEST['n'];
//echo $step_no."<br>";
include "connection.php";
$query="select * from steps where article_id=".$article." && step_no=".$step_no;
//echo $query;
$res=mysqli_query($con,$query);
$row=mysqli_fetch_array($res);
$video=$row[2];
$audio=$row[3];
$image=$row[4];
//echo "<br>".$video." ".$audio." ".$image;
?>

<head>
    <link href="css/style.css" rel="stylesheet">
</head>

<table align="center" cellspacing="10" cellpadding="10" style="font-size: larger;">

    <tr align="center">
        <td> <img src="image/icon%20previous.png" height="80px" width="80px" onclick="go1('previous')" title="Previous Step"> </td>
        <td>
            <?php
            if($video!="")
            { ?>
                <div style="font-size: larger;color: darkorange">
               <b> Step No. <?php echo $row[7]?> </b>
                <br>
                <b>Description : </b>  <?php echo $row[6] ?>
                </div>
                <br>

                <video controls height="450px" width="450px" autoplay="autoplay">
                    <source src="<?php echo $video ?>" type="video/mp4">
                </video>
            <?php
            }
            elseif($audio!="")
            { ?>
                <div style="font-size: larger;color: darkorange">
                    <b> Step No. <?php echo $row[7]?> </b>
                    <br>
                    <b>Description : </b>  <?php echo $row[6] ?>
                </div>
                <br>
                <audio controls="controls" autoplay="autoplay">
                    <source src="<?php echo $audio ?>" type="audio/mp3">
                </audio>
            <?php
            }
            elseif($image!="")
            {
                ?>
                <div style="font-size: larger;color: darkorange">
                    <b> Step No. <?php echo $row[7]?> </b>
                    <br>
                    <b>Description : </b>  <?php echo $row[6] ?>
                </div>
                <br>
                <img src="<?php echo $image ?>" height="450px" width="450px">
             <?php
            }
            else
            {
                if($step_no==-1)
                { ?>
                    <h2>End of the Article</h2>
            <?php

                }
            }
            ?>
        </td>
        <td><img src="image/next%20icon.png" height="80px" width="80px" onclick="go1('Next')" title="Next Step"> </td>
    </tr>
</table>
