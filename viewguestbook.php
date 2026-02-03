<?php
// Connect to server and select database.
include("config.php");
$sql="SELECT * FROM guestbook";
$objQuery = mysqli_query($objCon,$sql);
while($rows=mysqli_fetch_array($objQuery))
{
?>
<table width="400" border="0" align="center" cellpadding="0"
cellspacing="1" bgcolor="#CCCCCC">
<tr>
<td><table width="400" border="0" cellpadding="3"
cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td>ID</td>
<td>:</td>
<td><?php echo $rows['id']; ?></td>
</tr>
<tr>
<td width="117">Name</td>
<td width="14">:</td>
<td width="357"><?php echo $rows['name']; ?></td>
</tr>
<tr>
<td>Email</td>
<td>:</td>
<td><?php echo $rows['email']; ?></td>
</tr>
<tr>
<td valign="top">Comment</td>
<td valign="top">:</td>
<td><?php echo $rows['comment']; ?></td>
</tr>
<tr>
<td valign="top">Date/Time </td>
<td valign="top">:</td>
<td><?php echo $rows['datetime']; ?></td>
</tr>
</table></td>
</tr>
</table>
<?php
}
?>