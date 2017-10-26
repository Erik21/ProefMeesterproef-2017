<?php
include_once 'dbconfig.php';
if(isset($_POST['btn-upload']))
{    	
		include_once 'dbconfig.php';
   
	//$file = rand(1000,100000)."-".$_FILES['file']['name'];
	$file = $_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$folder="uploads/";

	$allowed = array('jpg', 'jpeg', 'png', 'pdf');
	
	// nieuwe size in KB
	$new_size = $file_size/1024;  
	
	// maakt kleine letters aan
	

	$fileExt = explode('.', $file);
	$new_file_name = strtolower(end($fileExt));
	//$new_file_name = strtolower($fileExt);
	
	//
	$final_file=str_replace(' ','-',$new_file_name);
	
	if(move_uploaded_file($file_loc,$folder.$final_file))
	{
		if (in_array($final_file, $allowed)) {
			$sql="INSERT INTO tbl_uploads(file,type,size) VALUES('$final_file','$file_type','$new_size')";
			mysqli_query($conn, $sql);
			?>
			<script>
			alert('Je bestand is geupload');
	        window.location.href='index.php?success';
	        </script>
			<?php
		} else 
			{
				?>
				<script>
				alert('Error tijdens uploaden');
        		window.location.href='index.php?fail';
        		</script>
				<?php
		}
	}

	else
	{
		?>
		<script>
		alert('Error tijdens uploaden');
        window.location.href='index.php?fail';
        </script>
		<?php
	}
}

?>