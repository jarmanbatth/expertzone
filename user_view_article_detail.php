<head>
    <script type="text/javascript">
        var xmlhttp;
        var step;
        function go1(event)
        {
            try
            {
                xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");// For Old Microsoft Browsers
            }
            catch (e)
            {
                try
                {
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");  // For Microsoft IE 6.0+
                }
                catch (e2)
                {
                    xmlhttp = new XMLHttpRequest();        //For Mozilla, Opera Browsers
                }
            }

            step = document.getElementById("step_no").value;
            var step_no;
            var total_steps=document.getElementById("total_steps").value;
            if(event=="start")
            {
                step_no=1;
            }
            else if(event=="previous")
            {
                step_no=parseInt(step)-1;
                if(step_no<=0)
                {
                    alert("This is the First step");
                    step_no=1;
                }
            }
            else
            {
                step_no=parseInt(step)+1;
                if(step_no>total_steps)
                {
                    alert("This is the Last Step");
                    step_no=-1;
                }

            }

            document.getElementById("step_no").value=step_no;
            var article=document.getElementById("article_id").value;

            xmlhttp.onreadystatechange=go2;
            xmlhttp.open("GET","get_step_data.php?n="+step_no+"&a="+article,true);
            xmlhttp.send();
        }
        function go2()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("view_steps").innerHTML=xmlhttp.responseText;
            }
        }
    </script>
</head>
<body onload="go1('start')" >
<?php
include"connection.php";
include"user_header.php";
$article_id=$_REQUEST['q'];
$query="select * from `article` where article_id=".$article_id."";
//echo $query;
$res=mysqli_query($con,$query);
$row=mysqli_fetch_array($res);
if($row[4]=="PDF" || $row[4]=="pdf" )
{
    ?><center>
    <table  width="80%">
        <tr>
            <th>
                <h2 style="color:lightcoral;"> Detail view of <?php echo $row[1];?></h2>
            </th> </tr>
        <?php
        $query1="select * from `steps` where article_id=".$article_id."";
        // echo $query1;
        $res2=mysqli_query($con,$query1);
        while($row2=mysqli_fetch_array($res2))
        {
            // echo $row2[5]."<br>";
            ?>
            <tr align="center">
                <?php
                $val=explode("/",$row2[5]);
                // print_r($val);
                $row_count=count($val);
                //  echo $row_count-1;
                ?>
                <td><a href="<?php echo $row2[5]; ?>" target="_blank" style="text-decoration: none;font-size: larger;"><?php echo $val[$row_count-1]; ?></a></td>
            </tr>
            <tr><td><hr></td></tr>
        <?php
        }
        ?>
    </table>
    </center>
<?php }
else
{
    ?>

    <center><h2>Detail view of <u><?php echo strtoupper($row[1]);?></u> Article</h2> </center>
    <?php
    $step_query="select max(step_no) from steps where article_id=".$article_id;
    // echo $step_query;
    $step_res=mysqli_query($con,$step_query);
    $step_row=mysqli_fetch_array($step_res);
    $step_count=$step_row[0];
    //echo $step_count;
    ?>
    <input type="hidden" name="total_steps" id="total_steps" value="<?php echo $step_count ?>">
    <input type="hidden" name="step_no" id="step_no">
    <input type="hidden" name="article_id" id="article_id" value="<?php echo $article_id ?>">
    <?php
    $step_query1="select * from steps where article_id=".$article_id." and step_no=";
    // echo $step_query1;
    $step_res1=mysqli_query($con,$step_query1);
    ?>
    <div id="view_steps"></div>

<?php

}
?>
</body>
<?php
/*include "footer.html";
*/?>