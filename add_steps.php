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
$article_id=$_REQUEST['q'];
$query="select * from `article` where article_id='".$article_id."'";
$res=mysqli_query($con,$query);
$row=mysqli_fetch_array($res);
$type=$row[4];
$step_count=$row[5];
$article=$row[1];
//echo "total steps: ".$step_count;
$select ="select max(step_no) from steps where article_id=$article_id";
//echo $article_id;
$res_select=mysqli_query($con,$select);
$row_select=mysqli_fetch_array($res_select);
$step_no=$row_select[0];
if($step_no=="")
{
    $step=0;
}
else
{
    $step=$step_no;
}
if($step_count!=$step)
{ ?>


<form action="add_steps_action.php" method="post" enctype="multipart/form-data" onsubmit="return validate()">
    <h1>
    </h1>
    <table border="1" align="center">
        <tr>
            <th colspan="2"><h2>Add Steps for <br><?php echo $type ?> Article<br>
                Step No: <?php echo $step+1 ?></h2></th>
        </tr>
        <input type="hidden" name="id" value="<?php echo $article_id;?>">
        <input type="hidden" name="type" id="t" value="<?php echo $row[4];?>">
        <input type="hidden" name="step" value="<?php echo $row[5];?>">
        <input type="hidden" name="step_no" value="<?php echo $step ?>">

        <tr>
            <th> Article Name :</th>
            <th><input type="text" name="aname" value="<?php echo $row[1];?>"> </th>
        </tr>
        <tr>
            <th> Description :</th>
            <th><textarea rows="5" colspan="22" style="resize: none;" name="descp"></textarea> </th>
        </tr>

        <?php
        if($type=="HTML")
        { ?>
            <tr>
                <th colspan="2">
                    HTML Upload :  <input type="file" name="html[]" multiple>
                </th>
            </tr>
            <tr align="center">
                <th>  <?php
                    if(isset($_REQUEST['err'])&& $_REQUEST['err']==1)
                    {
                        echo "<span style='color:red;'> Please Choose correct data.</span>";
                    }
                    ?></th>
                <th><input type="SUBMIT" value="Save Settings"> </th>
            </tr>
     <?php   }
        else
        { ?>
        <tr>

            <th> Video Upload : </th><th><input type="file" name="video" id="video"> </th>
        </tr>
        <tr>

            <th> Audio Upload : </th><th><input type="file" name="audio" id="audio"> </th>
        </tr>
        <tr>

            <th> Image Upload : </th><th><input type="file" name="image" id="image"> </th>
        </tr>
            <tr>
                <th>  <?php
                    if(isset($_REQUEST['err'])&& $_REQUEST['err']==1)
                    {
                        echo "<span style='color:red;'> Please Choose correct data.</span>";
                    }
                    ?></th>
                <th><input type="SUBMIT" value="Next"> </th>
            </tr>

        <?php }
        ?>




    </table>
</form>
<?php

    }
    else
    {
        echo "<center><h1 style='color:red;'>All Steps added for <b> ".strtoupper($article)." </b> article </h1>
        <br>
        <h2>Total Step Count : $step_count </h2></center>";
    }
?>
<?php include "footer.html"; ?>