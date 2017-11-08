<?php
	include_once 'header.php';
	include_once 'includes/dbh.inc.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>inleverpunt-huiswerk.nl</h2>
		<?php
		if ($_SESSION['u_id'] !== "1") {
			if (isset($_SESSION['u_id'])) {
				echo "Je bent ingelogt!<br><br>Welkom ";
				echo $_SESSION['u_first'];
				echo " ";
				echo $_SESSION['u_last'];
				echo '<br>';
				echo 'Cohort: ';
				echo $_SESSION['u_cohort'];
				echo '<br>';
				echo 'Email: ';
				echo $_SESSION['u_email'];
				echo '<br><br><br>';

				$sql = "SELECT class FROM CMS GROUP BY class";
				$result = mysqli_query($conn, $sql) or die ("Error while querying");

				while($row=mysqli_fetch_array($result)) {
					$name = $row['class'];
					echo "<h1>$name<h1/>";
					echo '<button><a href="assignments.php?class=' . $name . '">Inleveren</a></button>';
					echo '<br><br>';
				}
			}
		}



			if ($_SESSION['u_id'] == "1") {
				echo '<br><br><br><br>';
				include 'view.php';
				echo '<br><br>';
				echo "<button><a href='dashboard.php'>Dashboard</a></button>";
				
				echo '<br><br><br><br>';
			}
			
		?>

	</div>
</section>

<?php
	include_once 'footer.php';
?>