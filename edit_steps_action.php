<?php
$step_id=$_REQUEST['q'];
$art=$_REQUEST['art'];
//echo $step_id;
include "employee_header.php";
include "connection.php";
$query="select * from steps where id=".$step_id;
//echo $query;
$res=mysqli_query($con,$query);
$row=mysqli_fetch_array($res);

?>
<head>
    <script type="text/javascript">
        function validate()
        {
            var audio=document.getElementById("audio").value;
            var video=document.getElementById("audio").value;
            var image=document.getElementById("image").value;
            if(audio!="" )
            {
                if( video !="" || image !="")
                {
                    alert("Select only 1 File to Upload");
                    return false;
                }

            }
            else if(image!="")
            {
                if(audio !="" || video !="")
                {
                    alert("Select only 1 File to Upload");
                    return false;
                }

            }
            else if(video!="")
            {
                if(audio!="" || image !="")
                {
                    alert("Select only 1 File to Upload");
                    return false;
                }
            }
            else if(audio !="" && video!="" && image !="")
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
<form action="save_step.php" method="post" enctype="multipart/form-data" onsubmit="return validate()">
    <input type="hidden" name="step_id" value="<?php echo $step_id ?>">
    <input type="hidden" name="article_id" value="<?php echo $art ?>">
<table align="center" style="border: 2px black double;">
    <tr>
        <th colspan="3"><h2>Edit Steps</h2></th>
    </tr>
    <tr>
        <th colspan="3">Step No. <?php echo $row[7] ?></th>
    </tr>
    <tr><th colspan="3"><hr></th> </tr>
    <tr>
        <th colspan="3">
            <?php
            if(isset($_REQUEST['v_err']) && $_REQUEST['v_err']==1)
            {
                echo "Select only .mp4 files for video";
            }
            elseif(isset($_REQUEST['a_err']) && $_REQUEST['a_err']==1)
            {
                echo "Select only .mp3 files for Audio";
            }
            elseif(isset($_REQUEST['i_err']) && $_REQUEST['i_err']==1)
            {
                echo "Select only .jpg,.png..gif files for Images";
            }
            else
            {
                echo "";
            }
            ?>
        </th>
    </tr>
    <tr align="center">
        <th> Video Upload : </th>
        <th>
            <?php
            if($row['video']!="")
            { ?>
                <video controls height="200px" width="200px">
                    <source src="<?php echo $row['video'] ?>" type="video/mp4">
                </video>
            <?php
            }
            ?>
            </th>
        <th>
            <input type="file" name="video" id="video">
             </th>
    </tr>

    <tr align="center">

        <th> Audio Upload : </th>
        <th>
            <?php
            if($row['audio']!="")
            { ?>
                <audio controls="controls">
                    <source src="<?php echo $row['audio'] ?>" type="audio/mp3">
                </audio>
             <?php
            }
            ?>
            </th>
        <th>
            <input type="file" name="audio" id="audio"> </th>
    </tr>
    <tr align="center">

        <th> Image Upload : </th>
        <th>
            <?php
            if($row['image']!="")
            { ?>
                <img src="<?php echo $row['image'] ?>" height="200px" width="200px">
            <?php
            }
            ?>
            </th>
        <th>
            <input type="file" name="image" id="image"> </th>
    </tr>
    <tr><th colspan="3"><hr></th> </tr>
    <tr>
        <th></th>
        <th><a href="edit_steps.php?q=<?php echo $art ?>"><input type="button" value="BACK"> </a> </th>
        <th>
            <input type="submit" value="SAVE STEP">
        </th>
    </tr>
</table>
</form>
<?php include "footer.html"; ?>