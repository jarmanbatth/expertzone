<?php
include"connection.php" ;
include"adminheader.php";
?>
<form action="new_group_action.php" method="post" enctype="multipart/form-data">
    <table border="1">
        <tr>
            <th colspan="2"> <h2>NEW GROUP</h2></th>
        </tr>
        <tr>
            <th>
                Group Name
            </th>
            <th>
                <input type="text" name="gname" required placeholder="Group Name">

            </th>
        </tr>
        <tr>



            <th>
                <input type="hidden"  value=""  name="ac">

            </th>
        </tr>
        <tr>
            <th>
                Description
            </th>
            <th>
                <textarea name="desc" required placeholder="Give Description" ></textarea>

            </th>
        </tr>
        <tr>
            <th>
                Icon
            </th>
            <th>
                <input type="file" name="file1">

            </th>
        </tr>
        <tr>
            <th><?php
                if (isset($_REQUEST['q']) && $_REQUEST['q']==1)
                {
                echo "<span style='color:red;'> Group Added Successfully</span>";
                }
               if(isset($_REQUEST['q']) && $_REQUEST['q']==17)
                {
                    echo "<span style='color:red;'> Group Name already exists</span>";
                } ?>

            </th>
            <th>
                <input type="submit" value="Add group">

            </th>
        </tr>

    </table>
</form>
