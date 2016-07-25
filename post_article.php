<head>
    <script type="text/javascript">
        function select_type(val)
        {
            if(val=="PDF")
            {
                document.getElementById("steps").style.display="none";
                document.getElementById("pdf_data").style.display="block";
                document.getElementById("pdf_descp").style.display="block";
            }
            else
            {
                document.getElementById("steps").style.display="block";
                document.getElementById("pdf_data").style.display="none";
                document.getElementById("pdf_descp").style.display="none";
            }
        }
    </script>
</head>
<?php
include"connection.php";
include"employee_header.php";
?>
<form action="post_article_action.php" method="post" enctype="multipart/form-data">
    <table style="border: 2px black double;" align="center">
        <tr>
            <th colspan="2"> <h2>Post new article</h2></th>
        </tr>
        <tr><th colspan="2"><hr></th> </tr>
        <tr>
            <th>Article Name : </th>
            <th> <input type="text" name="aname" required placeholder="Article Name"></th>
        </tr>
        <tr><th colspan="2"><hr></th> </tr>
        <tr>
            <th>Description: </th>
            <th> <textarea name="des" placeholder="Give Description"></textarea>
        </tr>
        <tr><th colspan="2"><hr></th> </tr>
        <tr>
            <th>Select category: </th>
            <th>
                <select name="cat" required>
                    <option value="">--------Select--------</option>
                    <?php
                    $query="select * from `category`";
                    $res=mysqli_query($con,$query);
                    while($row=mysqli_fetch_array($res))
                    {?>
                    <option value="<?php echo $row[0];?>"><?php echo $row[0];?></option>
                    <?php
                    }
                    ?>
                </select>
            </th>
        </tr>
        <tr><th colspan="2"><hr></th> </tr>
        <tr>
            <th> Types of Steps : </th>
            <th><input type="radio" name="type" value="PDF" onclick="select_type(this.value)"> PDF
                <input type="radio" name="type" value="Step By Step" onclick="select_type(this.value)"> Step By Step
            </th>
        </tr>
        <tr><th colspan="2"><hr></th> </tr>
        <tr >
            <th colspan="2">
                <table id="pdf_data" style="display: none;">
                    <tr>
                        <th> Select File(s):
                        <input type="file" name="pdf[]" multiple> </th>
                    </tr>
                </table>
            </th>

        </tr>

        <tr>
            <th colspan="2">
                <table id="steps" style="display: none;">
                    <tr>
                        <th colspan="2">Number of Steps :
                        <input type="text" name="steps"> </th>
                    </tr>
                </table>

        </tr>

        <tr>
            <th> Hash Tags: </th>
            <th>
                <input type="text" name="tag" required>
                <br> ( Separate Hash Tags with Comma)
            </th>
        </tr>
        <tr><th colspan="2"><hr></th> </tr>
        <tr>
            <th> Author Email: </th>
            <th>
                <input type="email" name="email" required readonly value="<?php echo $_SESSION['emp'];?>">
            </th>
        </tr>
        <tr><th colspan="2"><hr></th> </tr>
        <tr>
            <th>
                <?php
                if(isset($_REQUEST['err']) && $_REQUEST['err']==1)
                {
                    echo "<span style='color:red;'>Select HTML Files only.</span>";
                }

                ?>
            </th>
            <th>
                <input type="submit" value="ADD ARTICLE" >
            </th>
        </tr>

    </table>
</form>
<?php
include("footer.html");
?>

