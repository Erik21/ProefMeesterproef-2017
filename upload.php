<?php
	include_once 'header.php';
include_once 'includes/dbh.inc.php';
if(isset($_POST['btn-upload']))
{    	   
	//$file = rand(1000,100000)."-".$_FILES['file']['name'];
	$file = $_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
	$file_size = $_FILES['file']['size'];
	$file_type = $_FILES['file']['type'];
	$folder="uploads/";

	$allowed = array('jpg', 'jpeg', 'png', 'pdf');
	
	// nieuwe size in KB
	$new_size = $file_size/1024;  
	
	
	$fileExt = explode('.', $file);
	$new_file_name = strtolower(end($fileExt));
	$final_file=str_replace(' ','-',$new_file_name);
	

	//$new_file_name = strtolower($file);
	//$final_file=str_replace(' ','-',$new_file_name);

	
	if(move_uploaded_file($file_loc,$folder.$file))
	{
		if (in_array($final_file, $allowed)) {
			$id = $_SESSION['u_id'];

			$sql="INSERT INTO tbl_uploads(file,type,size,user_id) VALUES('$file','$file_type','$new_size','$id')";
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
				alert('Fout tijdens uploaden');
        		window.location.href='index.php?fail';
        		</script>
				<?php
		}
	}

	else
	{
		?>
		<script>
			alert('Fout tijdens het uploaden');
       		window.location.href='index.php?fail';
        </script>
		<?php
	}
}

?>