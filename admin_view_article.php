<head>
    <script type="text/javascript">
        var xmlhttp;

        function go1()
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

            cat = document.getElementById("cat").value;

            xmlhttp.onreadystatechange=go2;
            xmlhttp.open("GET","admin_delete_article.php?q="+cat,true);
            xmlhttp.send();
        }
        function go2()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                document.getElementById("admin_delete_article").innerHTML=xmlhttp.responseText;
            }
        }
    </script>
</head>

<?php
include"connection.php";
include"adminheader.php";
?>
<form action="" method="post">
    <table style="border: 4px black groove;" align="center" cellspacing="5" cellpadding="5">
        <tr>
            <th colspan="2">
                <h2>VIEW ARTICLES</h2>
            </th>
        </tr>
        <tr>
            <th> Select Category of Article : </th>
            <th>
                <select name="cat" id="cat" required>
                    <option value="">---Select---</option>
                    <?php
                    $query="select * from `category`";
                    $res=mysqli_query($con,$query);
                    while($row=mysqli_fetch_array($res))
                    {?>
                        <option value="<?php echo urlencode($row[0]); ?>"><?php  echo $row[0]; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </th>
        </tr>
        <tr>

            <th colspan="2"> <input type="button" value="Show" onclick="go1()"></th>
        </tr>
    </table>

</form>
<div id="admin_delete_article">

</div>
<?php include "footer.html";