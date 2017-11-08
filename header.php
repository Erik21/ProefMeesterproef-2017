<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
 	<title></title>
 	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<header>
	<nav>
		<div class="main-wrapper">
			<ul>
				<div class="logo">
				<li><a href="index.php"><img src="https://forcedesign.nl/wp-content/uploads/2017/11/LogoSmall-1.png"></a></li>
				</div>
			</ul>	
			<div class="nav-login">
				<?php
					if (isset($_SESSION['u_id'])) {
						echo '<form action="includes/logout.inc.php" method="POST">
							<button type="submit" name="submit">Log uit</button>
							</form>';
					} else {
						echo '<form action="includes/login.inc.php" method="POST">
 								<input type="text" name="uid" placeholder="Gebruikersnaam/Email">
 								<input type="password" name="pwd" placeholder="Wachtwoord">
 									<button type="submit" name="submit">Login</button>
 								</form>	
 							<a href="signup.php">Aanmelden</a>';
					}
				?>
			</div>
		</div>
	</nav>
</header>