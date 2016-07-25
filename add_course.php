<?php
include("connection.php");
include("adminheader.php");
?>
<form action="add_course_action.php" method="post">
    <table border="1">
        <tr>
            <th colspan="2"> <h2>ADD COURSE</h2></th>
        </tr>
        <tr>
            <th>Name of Course : </th>
            <th> <input type="text" name="course_name" required placeholder="Course Name"></th>
        </tr>
        <tr>
            <th>Description : </th>
            <th> <textarea name="des" required placeholder="Give Description"></textarea></th>
        </tr>
        <tr>
        <tr>
            <th>Type of Course: </th>
            <th>
            <select name="course">
                <option value="Diploma">Diploma</option>
                <option value="Graduation">Graduation</option>
                <option value="Post Graduation">Post Graduation</option>
            </select>
            </th>
        </tr>
        <tr>
            <th>
                <?php
                if(isset($_REQUEST['q']) && $_REQUEST['q']==1)
                {
                    echo "<span style='color: red;'>Course Name already Exists. </span>";
                }
                if(isset($_REQUEST['q']) && $_REQUEST['q']==2)
                {
                    echo "<span style='color: red;'>Course Added Successfully </span>";
                }
                ?></th>
            <th> <input type="submit" name="sub" value="ADD Course"> </th>
        </tr>
    </table>
</form>
<?php include "footer.html";