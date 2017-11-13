<?php
	include_once 'header.php';
	include_once 'includes/dbh.inc.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>inleverpunt-huiswerk.nl</h2>
		<?php
			if (isset($_SESSION['u_id'])) {
				echo "<br>";
				echo "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate ";
				echo '<br><br><br><br><br>';

				if (isset($_GET['class'])) {
					$class = $_GET['class'];

					$sql = "SELECT * FROM CMS WHERE class = '$class'";
					$result = mysqli_query($conn, $sql) or die ("Error while querying");

					while($row=mysqli_fetch_array($result)) {
						$title = $row['name'];
						echo "<h1>$title</h1>";
						echo '<button><a href="submitAssignment.php">Inleveren</a></button>';
						echo '<br><br><br><br>';
					}
				}

			}
			
		?>

	</div>
</section>

<?php
	include_once 'footer.php';
?>