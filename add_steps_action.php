<?php
include"connection.php";
include"employee_header.php";
$article_id=$_REQUEST['id'];
$text=$_REQUEST['descp'];
$qu="select * from `article` where article_id='".$article_id."'";
$r=mysqli_query($con,$qu);
$row1=mysqli_fetch_array($r);
$t=$row1[4];
$step_count=$row1[5];

if($t=="HTML")
{

}
else
{
    $step_no=$_REQUEST['step_no']+1;
    if($step_no>$step_count)
    {
       header("location:finish_steps.php");
    }
    else
    {
        $v_name=$_FILES['video']['name'];
        $v_temp=$_FILES['video']['tmp_name'];
        $v_type=$_FILES['video']['type'];

        $a_name=$_FILES['audio']['name'];
        $a_temp=$_FILES['audio']['tmp_name'];
        $a_type=$_FILES['audio']['type'];

        $i_name=$_FILES['image']['name'];
        $i_temp=$_FILES['image']['tmp_name'];
        $i_type=$_FILES['image']['type'];

        if($i_name!="" && $a_name=="" && $v_name=="")
        {

            if($i_type="image/png" || $i_type=="image/jpeg" || $i_type=="image/gif")
              {
            $i_path="image/step_by_step_data/images/".$i_name;
            move_uploaded_file($i_temp,$i_path);
            $query="insert into `knowledge`.`steps`(`id`,`article_id`,`image`,`description`,`step_no`) values (null,".$article_id.",'".$i_path."','".$text."',$step_no)";
            echo $query;
            mysqli_query($con,$query);
            echo "done";
            header("location:allarticle.php");
                 }
        }
        elseif($a_name!="" && $i_name=="" && $v_name=="")
        {
            if($a_type="audio/rec" || $a_type=="audio/mp3")
            {
            $a_path="image/step_by_step_data/audios/".$a_name;
            move_uploaded_file($a_temp,$a_path);
            $query="insert into `knowledge`.`steps`(`id`,`article_id`,`audio`,`description`,`step_no`) values (null,".$article_id.",'".$a_path."','".$text."',$step_no)";
            echo $query;
            mysqli_query($con,$query);
            echo "done";
            header("location:allarticle.php");
            }
        }
        elseif($v_name!="" && $i_name=="" && $a_name=="")
        {
            if($v_type="video/mp4" || $v_type=="video/wmv")
         {
            $v_path="image/step_by_step_data/videos/".$v_name;
            move_uploaded_file($v_temp,$v_path);
            $query="insert into `knowledge`.`steps`(`id`,`article_id`,`video`,`description`,`step_no`) values (null,".$article_id.",'".$v_path."','".$text."',$step_no)";
            echo $query;
            mysqli_query($con,$query);
            echo "done";
            header("location:allarticle.php");
          }
        }
        else
        {

        }
    }




}
?>