<head>
    <script type="text/javascript">
        function validate()
        {
            var audio=document.getElementById("audio").value;
            var video=document.getElementById("video").value;
            var image=document.getElementById("image").value;
            if(audio!="" )
            {
                if( video!="" || image!="")
                {
                    alert("Select only 1 File to Upload");
                    return false;
                }

            }
            else if(image!="")
            {
                if(audio!="" || video!="")
                {
                    alert("Select only 1 File to Upload");
                    return false;
                }

            }
            else if(video!="")
            {
                if(audio!="" || image!="")
                {
                    alert("Select only 1 File to Upload");
                    return false;
                }
            }
            else if(audio!="" && video!="" && image!="")
            {
                alert("Select only 1 File to Upload");
                return false;
            }
            else
            {
                return true;
            }
        }
    </script>
</head>
<?php
include"connection.php";
include"employee_header.php";
$id=$_REQUEST['q'];
$query1="select * from `article` where article_id=".$id;
$res1=mysqli_query($con,$query1);
$row1=mysqli_fetch_array($res1);
$type=$row1[4];
$query="select * from `article` inner join `steps` on `article`.`article_id`=`steps`.`article_id` where `article`.`article_id`=".$id."";
//  echo $query;
$res=mysqli_query($con,$query);
$count=0;
if($type=="HTML")
{ ?>
    <table align="center" cellspacing="10" cellpadding="5" width="600px">
        <tr>
            <th>Article Name : </th> <td style="font-size: xx-large;"><?php echo ucwords($row1[1]) ?></td>
        </tr>
        <tr>
            <th>Description : </th> <td><?php echo ucwords($row1['description']) ?></td>
        </tr>
        <tr>
            <th>Article Type :</th> <td><?php echo strtoupper($row1['type']) ?></td>
        </tr>
        <tr>
            <th colspan="2"><hr></th>
        </tr>
        <tr>
            <th colspan="2"><h4>LIST OF CONTENTS</h4></th>
        </tr>
        <?php
        while($row_art=mysqli_fetch_array($res))
        {
        $val=explode("/",$row_art['html_data']);
        $row_count=count($val);
        //echo $row_count;

        ?>
        <tr>
            <th colspan="2"><a href="<?php echo $row_art['html_data']; ?>" target="_blank"><?php echo $val[$row_count-1]; ?></a></th>
            <?php
            }
            ?>
        </tr>
    </table>
<?php
}
else
{ ?>
    <table  align="center" cellspacing="10" cellpadding="5" width="600px">
        <tr>
            <th>Article Name : </th> <td style="font-size: xx-large;"><?php echo ucwords($row1[1]) ?></td>
        </tr>
        <tr>
            <th>Description : </th> <td><?php echo ucwords($row1['description']) ?></td>
        </tr>
        <tr>
            <th>Article Type :</th> <td><?php echo strtoupper($row1['type']) ?></td>
        </tr>
        <tr>
            <th>Total Steps : </th> <td><?php echo $row1['step_count'] ?></td>
        </tr>
        <?php
        while($row_steps=mysqli_fetch_array($res))
        { ?>
            <tr style="background-color: brown;color:white;">
                <td colspan="2"> Step No. <?php echo $row_steps['step_no']; ?>
                <span style="float:right;margin-right: 10px;"><a href="edit_steps_action.php?q=<?php echo $row_steps[8] ?>&art=<?php echo $id ?>" style="color: white;">Edit Step</a> </span>
                </td>
            </tr>
            <?php
            if($row_steps['audio']!="")
            { ?>
                <tr>
                    <th>Title :</th>
                    <td>
                        <audio controls>
                            <source src="<?php echo $row_steps['audio'] ?>" type="audio/mpeg">
                            <source src="<?php echo $row_steps['audio'] ?>" type="audio/ogg">
                            Your browser does not support the audio element.
                        </audio></td>
                </tr>
            <?php
            }
            elseif($row_steps['video']!="")
            { ?>
                <tr>
                    <th>Title: </th>
                    <td>
                        <video width="320" height="240" controls>
                            <source src="<?php echo $row_steps['video'] ?>" type="video/mp4">
                            <source src="<?php echo $row_steps['video'] ?>" type="video/ogg">
                            Your browser does not support the video tag.
                        </video>
                    </td>
                </tr>

            <?php

            }
            else
            { ?>
                <tr>
                    <th>Title: </th>
                    <td>
                        <img src="<?php echo $row_steps['image'] ?>" height="240px" width="320px">
                    </td>
                </tr>

            <?php
            }
            ?>

        <?php
        }
        ?>
    </table>
<?php

}
include "footer.html";