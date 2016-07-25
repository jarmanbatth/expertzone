<?php

session_start();
if(isset($_SESSION['admin']))
{

}
else
{
    header("location:login.php");
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
    <div class="logo"><img src="images/logo.png" alt="" border="0" /></div>


</div>

<div class="nav-bar">
    <ul id="menu">
        <?php

        if($_SESSION['type']=="super Admin")
        {
            ?>

            <li><a href="home.php" style="font-size: larger;">Home</a></li>
            <li><a href="#">Admin Management</a>
                <ul class="sub-menu">
                    <li><a href="addadmin.php" style="font-size: larger;">Create New Admin</a></li>
                    <li><a href="viewadmins.php" style="font-size: larger;">View Admin</a></li>
                </ul>
            </li>
            <li> <a href="#">Employee Management</a>
                <ul class="sub-menu">
                    <li> <a href="addnewemployee.php" style="font-size: larger;">Add New Employee</a></li>
                    <li><a href="admin_view_employee.php" style="font-size: larger;">View Employees</a> </li>
                </ul>
            </li>
            <li> <a href="#">Course Management</a>
                <ul class="sub-menu">
                    <li><a href="add_course.php" style="font-size: larger;">Add Course</a></li>
                    <li> <a href="view_Course.php" style="font-size: larger;">View Course</a></li>
                </ul>
            </li>

            <li> <a href="#">Category & News Management</a>

                <ul class="sub-menu">
                    <li><a href="add_category.php" style="font-size: larger;">Add Category</a></li>
                    <li><a href="view_category.php" style="font-size: larger;">View Category</a></li>
                    <li><a href="addnews.php" style="font-size: larger;">Add News</a></li>
                    <li><a href="viewnews.php" style="font-size: larger;">View News</a></li>
                </ul>
            </li>
            <li><a href="admin_view_article.php" style="font-size: larger;">View Article</a></li>
            <li><a href="#">&nabla;</a>
                <ul class="sub-menu">
                    <li><a href="viewfeedback.php" style="font-size: larger;">View Feedback</a></li>
                    <li><a href="changepassword.php" style="font-size: larger;">Change Password</a></li>
                    <li><a href="logout.php?q=admin" style="font-size: larger;">Logout</a></li>
                </ul>
            </li>
        <?php
        }
        elseif($_SESSION['type']=="limited user")
        {
            ?>

            <li><a href="home.php" style="font-size: larger;">Home</a></li>
            <li><a href="#">Admin Management</a>
                <ul class="sub-menu">
                    <li><a href="addadmin.php" style="font-size: larger; display: none;" >Create New Admin</a></li>
                    <li><a href="viewadmins.php" style="font-size: larger;">View Admin</a></li>
                </ul>
            </li>
            <li> <a href="#">Employee Management</a>
                <ul class="sub-menu">
                    <li> <a href="addnewemployee.php" style="font-size: larger;display: none;">Add New Employee</a></li>
                    <li><a href="admin_view_employee.php" style="font-size: larger;">View Employees</a> </li>
                </ul>
            </li>
            <li> <a href="#">Course Management</a>
                <ul class="sub-menu">
                    <li><a href="add_course.php" style="font-size: larger;display: none;">Add Course</a></li>
                    <li> <a href="view_Course.php" style="font-size: larger;">View Course</a></li>
                </ul>
            </li>

            <li> <a href="#">Category & News Management</a>

                <ul class="sub-menu">
                    <li><a href="add_category.php" style="font-size: larger;display: none;">Add Category</a></li>
                    <li><a href="view_category.php" style="font-size: larger;">View Category</a></li>
                    <li><a href="addnews.php" style="font-size: larger;display: none;">Add News</a></li>
                    <li><a href="viewnews.php" style="font-size: larger;">View News</a></li>
                </ul>
            </li>
            <li><a href="admin_view_article.php" style="font-size: larger;">View Article</a></li>
            <li><a href="#">&nabla;</a>
                <ul class="sub-menu">
                    <li><a href="viewfeedback.php" style="font-size: larger;">View Feedback</a></li>
                    <li><a href="changepassword.php" style="font-size: larger;">Change Password</a></li>
                    <li><a href="logout.php?q=admin" style="font-size: larger;">Logout</a></li>
                </ul>
            </li>
        <?php
        }
        else
        {
            ?>

            <li><a href="home.php" style="font-size: larger;">Home</a></li>
            <li><a href="#">Admin Management</a>
                <ul class="sub-menu">
                    <li><a href="addadmin.php" style="font-size: larger; display: none;" >Create New Admin</a></li>
                    <li><a href="viewadmins.php" style="font-size: larger;">View Admin</a></li>
                </ul>
            </li>
            <li> <a href="#">Employee Management</a>
                <ul class="sub-menu">
                    <li> <a href="addnewemployee.php" style="font-size: larger;display: none;">Add New Employee</a></li>
                    <li><a href="admin_view_employee.php" style="font-size: larger;">View Employees</a> </li>
                </ul>
            </li>
            <li> <a href="#">Course Management</a>
                <ul class="sub-menu">
                    <li><a href="add_course.php" style="font-size: larger;display: none;">Add Course</a></li>
                    <li> <a href="view_Course.php" style="font-size: larger;">View Course</a></li>
                </ul>
            </li>

            <li> <a href="#">Subject & News Management</a>

                <ul class="sub-menu">
                    <li><a href="add_category.php" style="font-size: larger;display: none;">Add Subject</a></li>
                    <li><a href="view_category.php" style="font-size: larger;">View Subjects</a></li>
                    <li><a href="addnews.php" style="font-size: larger;display: none;">Add News</a></li>
                    <li><a href="viewnews.php" style="font-size: larger;">View News</a></li>
                </ul>
            </li>
            <li><a href="admin_view_article.php" style="font-size: larger;">View Article</a></li>
            <li><a href="#">&nabla;</a>
                <ul class="sub-menu">
                    <li><a href="viewfeedback.php" style="font-size: larger;">View Feedback</a></li>
                    <li><a href="changepassword.php" style="font-size: larger;">Change Password</a></li>
                    <li><a href="logout.php?q=admin" style="font-size: larger;">Logout</a></li>
                </ul>
            </li>
            <?php
        }
        ?>
    </ul>
</div>

<div id="body-part">
    <div id="public">





    </div>

