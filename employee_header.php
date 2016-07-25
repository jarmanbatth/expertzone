<?php
include ("connection.php");
session_start();
if(isset($_SESSION['emp']))
{

}
else
{
    header("location:emp_login.php");
}

  ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Expert Zone</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="engine1/style.css" />
    <script type="text/javascript" src="engine1/jquery.js"></script>
</head>

<body>
<div id="top-head">
    <div class="logo" ><img src="images/logo.png" alt="" border="0" /></div>


</div>

<div>
    <div id="wowslider-container1">
        <div class="ws_images"><ul>
                <li><img src="data1/images/header.jpg" alt="header" title="header" id="wows1_0"/></li>
                <li><a href="http://wowslider.com/vi">
                        <img src="data1/images/image3.jpg" alt="javascript slider" title="1_01" id="wows1_1"/></a></li>
                <li><img src="data1/images/online_training.jpg" alt="images" title="images" id="wows1_2"/></li>
                <li><img src="data1/images/college.jpg" alt="images" title="images" id="wows1_3"/></li>
            </ul></div>
        <div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.com">html5 slideshow</a> by WOWSlider.com v7.8</div>
        <div class="ws_shadow"></div>
    </div>
    <script type="text/javascript" src="engine1/wowslider.js"></script>
    <script type="text/javascript" src="engine1/script.js"></script>
</div>

<div class="nav-bar">
    <ul id="menu">
        <li>    <a href="emp_home.php">Home</a></li>
        <li><a href="post_article.php">Post Article</a></li>
        <li><a href="allarticle.php">My Articles</a></li>
        <li><a href="emp_changepassword.php">Change Password</a>
        </li>
        <li> <a href="logout.php?q=emp">Logout</a></li>


    </ul>
</div>

<div id="body-part">
    <div id="public">

    </div>