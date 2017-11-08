<?php
	include_once 'header.php';
	include_once 'includes/dbh.inc.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>inleverpunt-huiswerk.nl</h2>
		<?php
		if ($_SESSION['u_id'] == "1") {
			if (isset($_SESSION['u_id'])) {
				$sql = "SELECT * FROM CMS GROUP BY class";
				$result = mysqli_query($conn, $sql) or die ("Error while querying");

				echo "<form method=\"POST\">";
				echo "<h1>Verander Gegevens</h1>";
				while($row=mysqli_fetch_array($result)) {
					$class = $row['class'];
					echo "Klas:";
					echo "<input type=\"text\" name=\"$class\" value=\"$class\">";
					echo '<br>';

					$_sql = "SELECT * FROM CMS WHERE class='$class'";
					$_result = mysqli_query($conn, $_sql) or die ("Error while querying");

					while($row=mysqli_fetch_array($_result)) {
						$name = $row['name'];
						$id = $row['id'];
						echo "Naam:";
						echo "<input type=\"text\" name=\"naam$id\" value=\"$name\">";
						echo '<br>';
					}
					echo "<br>";
				}

				echo "<input type=\"hidden\" name=\"confirm\" value=\"1\">";
				echo "<input type=\"button\" value=\"Voeg een opdracht toe\" onclick=\"window.open('addnewassignment.php','_self',false)\">";
				echo "<input type=\"submit\" value=\"Verander gegevens\">";
				echo "</form>";


				if ($_SERVER['REQUEST_METHOD'] == "POST") {
					if (isset($_POST['confirm'])) {

						$cms_sql = "SELECT * FROM CMS";
						$cms_result = mysqli_query($conn, $cms_sql) or die ("Error while querying");
						$success = true;

						while($row=mysqli_fetch_array($cms_result)) {
							$id = $row['id'];
							$class = $row['class'];
							$classs = $_POST[$class];
							$name = $_POST['naam'.$id];

							$sql = "UPDATE CMS SET class='$classs', name='$name' WHERE id='$id'";
							$result = mysqli_query($conn, $sql) or die ("Error while querying");
							if (!$result) {
								$success = false;
							}
						}

						if ($success) {
							echo "<script>";
							echo "location.reload();";
							echo "</script>";
						} else {
							echo "Er is iets verkeerd gegaan, probeer het opnieuw!";
						}
					}
				}
			}
		}
			
		?>

	</div>
</section>

<?php
	include_once 'footer.php';
?>