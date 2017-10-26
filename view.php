<?php
include_once 'dbconfig.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<body>
	<table width="80%" border="1">
    <tr>
    </tr>
    <tr>
    <td><b>Bestandsnaam</td>
    <td><b>Bestandstype</td>
    <td><b>Bestandgrootte in KB</td>
    <td><b>-</td>
    </tr>
    <?php
	$sql="SELECT * FROM tbl_uploads";
	$result_set=mysqli_query($conn, $sql);
	while($row=mysqli_fetch_array($result_set))
	{ 
		?>
        <tr>
        <td><?php echo $row['file'] ?></td>
        <td><?php echo $row['type'] ?></td>
        <td><?php echo $row['size'] ?></td>
        <td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">Bekijk</a></td>
        </tr>
        <?php
	}
	?>
    </table>
</body>
</html>