<?php
	include_once 'header.php';
	include_once 'dbconfig.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>inleverpunt-huiswerk.nl</h2>
		<?php
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
				include 'index2.php';
				echo '<br><br><br>';
				include 'view.php';
			}
			if (isset($_SESSION['u_id'] == "1")) {
				echo "Je bent ingelogt!<br><br>Welkom Leraar ";
				echo $_SESSION['u_id'];
			}
		?>

	</div>
</section>

<?php
	include_once 'footer.php';
?>