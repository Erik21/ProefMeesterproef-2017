<?php
include_once 'includes/dbh.inc.php';
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
    <td><b>Naam</td>
    </tr>
    <?php
	$sql="SELECT * FROM tbl_uploads";
	$result_set=mysqli_query($conn, $sql);
	while($row=mysqli_fetch_array($result_set))
	{ 
        $user_id = $row['user_id'];
        $user_sql="SELECT * FROM users WHERE user_id='$user_id'";
        $user_result_set=mysqli_query($conn, $user_sql);
        while($user_row=mysqli_fetch_array($user_result_set))
        {
            $fullname = $user_row['user_first'] . ' ' . $user_row['user_last'];
        }
		?>
        <td><?php echo $row['file']?></td>
        <td><?php echo $row['type']?></td>
        <td><?php echo $row['size']?></td>
        <td><?php echo $fullname?></td>
        <td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">Bekijk</a></td>
        </tr>
        <?php
	}
	?>
    </table>
</body>
</html>