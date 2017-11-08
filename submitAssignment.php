<?php
	include_once 'header.php';
	include_once 'dbconfig.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>inleverpunt-huiswerk.nl</h2>
		<?php
			if (isset($_SESSION['u_id'])) {
				echo "<br>";
				echo "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate ";
				echo '<br><br><br><br><br>';

				include 'uploader.php';

			}
			
		?>

	</div>
</section>

<?php
	include_once 'footer.php';
?>