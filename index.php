<?php
include "public_header.php";
include"connection.php";
?>
<!Doctype html>
<html>
<head>
    <link href="two_column.css" rel="stylesheet">
    <script>
        function go()
        {
            var val=0;
            if(document.getElementById("rd1").checked==true)
            {
                val=1;
            }
            else if(document.getElementById("rd2").checked==true)
            {
                val=2;
            }
            else if(document.getElementById("rd3").checked==true)
            {
                val=3;
            }
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("sp1").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "getpoll.php?q=" + val, true);
            xmlhttp.send();
        }
    </script>
</head>
<body>
<div id="all">
    <h1 style="color: orangered"><i>
            WELCOME TO EXPERT ZONE :</i>
    </h1>
    <div id="news">
        <h1 style='color:GrayText'>  Latest News </h1>
        <marquee direction="up" behavior="scroll" scrolldelay="seconds">
            <?php
            $query="select * from `news`";
            $res=mysqli_query($con,$query);
            ?>
            <?php
            while($row=mysqli_fetch_array($res))
            {
                ?>
                <a href=""> <h3 style="color:darkorange;"> <?php echo $row[1];?> : <?php echo $row[2];?></h3><img src="new.gif" height="30" width="60"> </a>
            <?php
            }
            ?>
            <br><br><br><br><br><br>
        </marquee>
    </div>
   <div id="right">
        <h1 style="color: GrayText">POLE</h1>
        <h2>Do You Like Our Website?</h2>
        Yes<input type="radio" onchange="go()" id="rd1" value="1" name="poll1" ><br>
        No <input type="radio" onchange="go()" id="rd2" value="2" name="poll1"><br>
        Not Yet<input type="radio" onchange="go()" id="rd3" value="3" name="poll1"><br>
        <span id="sp1">
            <?php
            $r="select * from poll";
            $result=mysqli_query($con,$r);
            $row=mysqli_fetch_array($result);


            $qt="select yes+no+not_yet from poll";


            $result=mysqli_query($con,$qt);

            $row=mysqli_fetch_array($result);

            $total=$row[0];
            echo "<br>"."Total Votes are ".$row[0];


            $t="select * from poll";



            $result=mysqli_query($con,$t);

            $row=mysqli_fetch_array($result);
            $y=$row[0]/$total*100;
            $n=$row[1]/$total*100;
            $cant=$row[2]/$total*100;
            echo '<div style=" color: white  ; background-color: red;width: '.$y.'px ">
&nbsp;
</div>Yes


<div style=" color: white  ; background-color: blue;width: '.$n.'px">
&nbsp;
</div> No
<div style=" color: white  ; background-color: green;width: '.$cant.'px">
&nbsp;
</div> Can t Say
';

            ?>
        </span>
    </div>
    </div>
    <div id="main">
        <span style="font-size: x-large;font-family: Arial, Helvetica, sans-serif;line-height: 100%;text-align: justify;"> Expert Zone is a computer system that emulates the decision-making ability of a human expert. Expert systems are designed to solve complex problems by reasoning about knowledge, represented primarily as if - then rules rather than through conventional procedural code.
            <br>An expert system is divided into two sub-systems: the inference engine and the knowledge base. The Expert Zone represents facts & rules.
        </span>

    </div>
<br>
    <br>
    <br>

<div style="clear: both;">
    <?php
    include "footer.html";
    ?>

</div>
</body>
</html>
