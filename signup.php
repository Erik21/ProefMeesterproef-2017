<?php
	include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Aanmelden</h2>
		<form class="signup-form" action="includes/signup.inc.php" method="POST">
			<input type="text" name="first" placeholder="Voornaam">
			<input type="text" name="last" placeholder="Achternaam">
			<input type="text" name="cohort" placeholder="Cohort">
			<input type="text" name="email" placeholder="E-mail">
			<input type="text" name="uid" placeholder="Username">
			<input type="password" name="pwd" placeholder="Password">
			<button type="submit" name="submit">Aanmelden</button>
		</form>
	</div>
</section>

<?php
	include_once 'footer.php';
?>