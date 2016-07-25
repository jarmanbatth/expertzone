<?php
$step_id=$_REQUEST['step_id'];
$article=$_REQUEST['article_id'];
$video=$_FILES['video']['name'];
$audio=$_FILES['audio']['name'];
$image=$_FILES['image']['name'];
include "connection.php";

if($video!="" && $audio=="" && $image=="")
{
    $video_type=$_FILES['video']['type'];
    $video_size=$_FILES['video']['size'];
    if($video_type=="video/mp4" || $video_type == "video/ogg")
    {
        $video_temp=$_FILES['video']['tmp_name'];
        $video_path="image/step_by_step_data/videos/".$video;
        move_uploaded_file($video_temp,$video_path);
        $query="update steps set video='".$video_path."' ,audio='',image='' where id=".$step_id;
        echo $query;
        mysqli_query($con,$query);
        header("location:edit_steps.php?q=$article");
    }
    else
    {
        header("location:edit_steps_action.php?q=$step_id&art=$article&v_err=1");
    }

}
elseif($audio!="" && $video=="" && $image=="")
{
    $audio_temp=$_FILES['audio']['tmp_name'];
    $audio_path="image/step_by_step_data/audios/".$audio;
    move_uploaded_file($audio_temp,$audio_path);
    $query="update steps set video='' ,audio='".$audio_path."',image='' where id=".$step_id;
    echo $query;
    mysqli_query($con,$query);
    header("location:edit_steps.php?q=$article");
}
elseif($image!="" && $video=="" && $audio=="")
{
    $image_temp=$_FILES['image']['tmp_name'];
    $image_path="image/step_by_step_data/images/".$image;
    move_uploaded_file($image_temp,$image_path);
    $query="update steps set video='' ,audio='',image='".$image_path."' where id=".$step_id;
    echo $query;
    mysqli_query($con,$query);
    header("location:edit_steps.php?q=$article");
}
else
{
    echo "Upload Nothing";
}