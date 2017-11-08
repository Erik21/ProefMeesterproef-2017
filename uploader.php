<?php
include_once 'includes/dbh.inc.php';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<body>
	<form action="upload.php" method="post" enctype="multipart/form-data">
	<input type="file" name="file" />
	<button type="submit" name="btn-upload">Upload</button>
	</form>
	<br>
    <?php
	if(isset($_GET['success']))
	{
		?>
        <label>Je bestand is geupload.</label>
        <?php
	}
	else if(isset($_GET['fail']))
	{
		?>
        <label>Error tijdens het uploaden.</label>
        <?php
	}
	?>
</body>
</html>