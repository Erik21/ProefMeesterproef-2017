<?php

if (isset($_POST['submit'])) {
	
	include_once 'dbh.inc.php';

	$first = mysqli_real_escape_string($conn, $_POST['first']);
	$last = mysqli_real_escape_string($conn, $_POST['last']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$cohort = mysqli_real_escape_string($conn, $_POST['cohort']);
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
	//$myuserName = mysqli_real_escape_string($conn, $_POST['myuserName']);
	$i = 0;

	//Error handlers
	//Check for empty fields
	if (empty($first) || empty($last) || empty($email) || empty($cohort) || empty($uid) || empty($pwd)) {
		header("Location: ../signup.php?signup=empty");
		exit();
	} else {
		//Check if input characters are valid
		if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last) || !preg_match('/^[0-9 .\/-]+$/i', $cohort)) {
			?>
			<script>
			alert('Vul de voornaam + achternaam en cohort juist in. Wanneer dit niet lukt vraag om info bij je leraar.');
			window.location.href='../signup.php?fail';
			</script>
			<?php
			//header("Location: ../signup.php?signup=invalid-pregMatch");
			exit();
		} else {
			//Check if email is valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				?>
				<script>
				alert('Email bestaat niet');
				window.location.href='../signup.php?fail';
				</script>
				<?php
				//header("Location: ../signup.php?signup=email");
				exit();
			} else {
				$sql = "SELECT * FROM users WHERE user_uid='$uid'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

				if ($resultCheck > 0) {
					//header("Location: ../signup.php?signup=usertaken");
					?>
					<script>
					alert('De gebruikersnaam is al in gebruik');
					window.location.href='../signup.php?fail';
					</script>
					<?php
					exit();
				} else {
					//Hashing the password
					$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
					//Insert the user into the database
					$sql = "INSERT INTO users (user_first, user_last, user_email, user_cohort, user_uid, user_pwd) VALUES ('$first', '$last', '$email', '$cohort', '$uid', '$hashedPwd');";
					mysqli_query($conn, $sql);
					//header("Location: ../signup.php?signup=success");
					header("Location: ../index.php?login=succesvol");
					exit();
				}
			}
		}
	}

} else {
	header("Location: ../signup.php");
	exit();
}