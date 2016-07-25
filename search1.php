<?php
include"connection.php";
$search=$_GET['q'];
$query="select * from `article` where a_name='".$search."'";
$res=mysqli_query($con,$query);
?>
<table align="center" cellpadding="7" cellspacing="7" style="border: 3px groove black;">
<?php
while($row=mysqli_fetch_array($res))
{
?>
<tr>
 <th>Article Name : </th><td><?php echo ucwords($row['a_name']) ?></td>
<td rowspan="3"><div style="height: 50px;width: 150px;background-color: burlywood;text-align: center;"><br><a href="view_an_article.php?q=<?php echo $row[0] ?>" style="text-decoration: none;" title="View Article <?php echo strtoupper($row[1]) ?>">VIEW ARTICLE</a> </div></td>
<td rowspan="3"><div style="height: 50px;width: 150px;background-color: burlywood;text-align: center;"><br><a href="edit_article.php?q=<?php echo $row[0] ?>" style="text-decoration: none;" title="Edit Article <?php echo strtoupper($row[1]) ?>">EDIT ARTICLE</a> </div></td>

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
?>
</table>
