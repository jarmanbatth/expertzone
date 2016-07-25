<?php
include "connection.php";
$query2="select * from `article` inner join `steps` on `article`.`article_id`=`steps`.`article_id` ";
echo $query2;
$res=mysqli_query($con,$query2);

while($row=mysqli_fetch_array($res)){
    ?>
    <table>
        <tr>
            <td>
                <input type="text" value="<?php echo $row[1] ?>">
            </td>
        </tr>
    </table>
<?php
}
?> $t=$t."<tr>";
    $t=$t."<td> $row[1]</td>";
    $t=$t."<td> $row[2]</td>";
    $t=$t."<td> $row[6]</td>";
    $t=$t."<td> $row[7]</td>";
    $t=$t."<td> $row[13]</td>";
    $t=$t."</tr>";