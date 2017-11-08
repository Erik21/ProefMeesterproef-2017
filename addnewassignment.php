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
				echo "<form method=\"POST\">";
				echo "<h4>Voeg een nieuwe opdracht toe:<br></h4>";
				echo "Klas: <input type=\"text\" name=\"klas\"><br>";
				echo "Naam: <input type=\"text\" name=\"naam\"><br>";
				echo "<input type=\"hidden\" name=\"confirm\" value=\"1\">";
				echo "<input type=\"button\" value=\"Terug\" onclick=\"window.open('dashboard.php','_self',false)\">";
				echo "<input type=\"submit\" value=\"Voeg een opdracht toe\" onclick=\"\">";
				echo "</form>";

				if (isset($_POST['confirm'])) {
					$class = $_POST['klas'];
					$name = $_POST['naam'];
					$sql = "INSERT INTO CMS (class, name) VALUES ('$class', '$name')";
					$result = mysqli_query($conn, $sql) or die ("Error while querying");
					if ($result) {
						echo "De gegevens zijn nu toegevoegd.";
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