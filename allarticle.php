<!doctype>
<html>
<head>
    <script type="text/javascript">
        function search()
        {
            var s=document.getElementById("search").value;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("show").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "search1.php?q="+ s , true);
            xmlhttp.send();
        }
        function view()
        {
            if(document.getElementById("search").value!="")
            {
                document.getElementById("tab1").style.display="none";
            }
            else
            {
                document.getElementById("tab1").style.display="block";
            }
        }
    </script>
    </head>
<?php
include("connection.php");
include("employee_header.php");
$email=$_SESSION['emp'];
$emp_query="select * from employee where email='".$email."'";
$res_emp=mysqli_query($con,$emp_query);
$row_emp=mysqli_fetch_array($res_emp);
$name=$row_emp[0]." ".$row_emp[1];
$design=$row_emp[7];
?>
<body oninput="view()">
<br>
<table align="center">
    <tr>  <th colspan="3">
            Search Article :
        </th>
        <th colspan="3">
            <input type="text" name="search" id="search" onchange="search()">
        </th></tr>
    <tr>
        <th colspan="6"><span id="show"></span></th>
    </tr>
</table>

<table align="center" id="tab1" cellpadding="2" cellspacing="2" style="border: 3px groove black;" border="0" >
    <tr>
        <th colspan="6"><h2>MY ARTICLES</h2></th>
    </tr>
    <tr>
        <td colspan="3" style="text-align: right;"><b>Employee's Details : </b></td>
        <td align="center" colspan="3">
            <table border="1">
                <tr>
                    <th>    Employee Name : </th>
                    <td><i><?php echo ucwords($name) ?></i></td>
                    </tr>
                <tr>
                    <th>    Employee Designation : </th>
                    <td><i><?php echo ucwords(strtolower($design)) ?></i></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <th colspan="6"><hr><hr></th>
    </tr>
    <?php
    $query="select * from `article` where a_email='".$email."' order by article_id desc";
    $res=mysqli_query($con,$query);
    $count=mysqli_num_rows($res);
    if($count>0)
    {

    while($row=mysqli_fetch_array($res))
    {
        if($row['type']=="PDF")
        { ?>
            <tr>
                <th>Article Name : </th><td><?php echo ucwords($row['a_name']) ?></td>
                <td rowspan="3"><div style="height: 50px;width: 150px;background-color: black;text-align: center;"><br><a href="view_an_article.php?q=<?php echo $row[0] ?>" style="text-decoration: none;" title="View Article <?php echo strtoupper($row[1]) ?>">VIEW ARTICLE</a> </div></td>
                <td rowspan="3"><div style="height: 50px;width: 150px;background-color: black;text-align: center;"><br><a href="edit_article.php?q=<?php echo $row[0] ?>" style="text-decoration: none;" title="Edit Article <?php echo strtoupper($row[1]) ?>">EDIT ARTICLE</a> </div></td>

            </tr>
            <tr>
                <th>Description :</th> <td><?php echo ucwords($row['description']) ?></td>
            </tr>
            <tr>
                <th>Category : </th>
                <td><?php echo strtoupper($row[3]) ?></td>
            </tr>
            <tr>
                <th colspan="6"><hr></th>
            </tr>
       <?php
        }
        else
        { ?>
            <tr>
                <th>Article Name : </th><td colspan="3"><?php echo ucwords($row['a_name']) ?></td>


            </tr>
            <tr>
                <th>Description : </th> <td colspan="3"><?php echo ucwords($row['description']) ?></td>

            </tr>
            <tr>
                <th>Category : </th><td colspan="3"><?php echo strtoupper($row[3]) ?></td>

            </tr>
            <tr>
                <th>Total Steps : </th> <td colspan="3"><?php echo $row['step_count'] ?></td>

            </tr>
            <tr>
                <td><div style="height: 70px;width: 150px;background-color: black;text-align: center;"><br><a href="view_an_article.php?q=<?php echo $row[0] ?>" style="text-decoration: none;" title="View Article <?php echo strtoupper($row[1]) ?>">VIEW ARTICLE STEP By STEP</a> </div></td>
                <td><div style="height: 70px;width: 150px;background-color: black;text-align: center;"><br><a href="edit_article.php?q=<?php echo $row[0] ?>" style="text-decoration: none;" title="Edit Article <?php echo strtoupper($row[1]) ?>">EDIT ARTICLE</a> </div></td>
                <td><div style="height: 70px;width: 150px;background-color: black;text-align: center;"><br><a href="add_steps.php?q=<?php echo $row[0] ?>" style="text-decoration: none;" title="Add Steps of <?php echo strtoupper($row[1]) ?> article">ADD STEPS</a> </div></td>
                <td><div style="height: 70px;width: 150px;background-color: black;text-align: center;"><br><a href="edit_steps.php?q=<?php echo $row[0] ?>" style="text-decoration: none;" title="Edit Steps of <?php echo strtoupper($row[1]) ?> article">EDIT STEPS</a> </div></td>
            </tr>
            <tr>
                <th colspan="6"><hr></th>
            </tr>
       <?php

            }
        ?>

<?php
        }
    }
    else
    { ?>
        <tr>
            <th colspan="6" style="color: red;font-size: xx-large;">No Article(s) posted by You yet.</th>
        </tr>
    <?php

    }
    ?>

</table>
        <span id="show"></span>
</body>
<?php include "footer.html" ?>