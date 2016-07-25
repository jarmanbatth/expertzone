
<?php
include"connection.php";
$aname=$_REQUEST['aname'];
$des=$_REQUEST['des'];
$cat=$_REQUEST['cat'];
$type=$_REQUEST['type'];
$steps=$_REQUEST['steps'];
$htag=$_REQUEST['tag'];
$email=$_REQUEST['email'];
if($type=="PDF")
{
    $query="insert into `article` values(null,'".$aname."','".$des."','".$cat."','".$type."','".$steps."','".$htag."','".$email."')";
    mysqli_query($con,$query);

    $select_art="select max(article_id) from article";
    $res_art=mysqli_query($con,$select_art);
    $row_art=mysqli_fetch_array($res_art);
    $art_id=$row_art[0];
    echo $art_id;
    $pdf=$_FILES['pdf']['name'];
    $pdf_type=$_FILES['pdf']['type'];
    $temp_pdf=$_FILES['pdf']['tmp_name'];
    $count=count($pdf);
     echo $count;
    for($i=0;$i<$count;$i++)
    {
        echo $pdf_type[$i]."<br>";
        $path_pdf="image/pdf_data/".$pdf[$i];
        move_uploaded_file($temp_pdf[$i],$path_pdf);
        if($pdf_type[$i]=="application/pdf")
        {
            $query="insert into `knowledge`.`steps`(`id`,`article_id`,`pdf_data`,`description`) values (null,".$art_id.",'".$path_pdf."','')";
            echo $query;
            mysqli_query($con,$query);
            header("location:allarticle.php");
        }
        else
        {
            header("location:post_article.php?err=1");
        }
    }
}
else
{
    $query="insert into `article` values(null,'".$aname."','".$des."','".$cat."','".$type."','".$steps."','".$htag."','".$email."')";
    mysqli_query($con,$query);
    header("location:allarticle.php");
}
