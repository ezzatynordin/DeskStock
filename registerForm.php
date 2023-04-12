<!-- registerForm.php -->

<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
</head>
<body>
	<h2>Registration Form</h2>
	<?php
		// start session
		session_start();

		// check for error message
		if (isset($_SESSION['error'])) {
			echo '<p style="color:red;">' . $_SESSION['error'] . '</p>';
			unset($_SESSION['error']);
		} elseif (isset($_SESSION['success'])) {
			echo '<p style="color:green;">' . $_SESSION['success'] . '</p>';
			unset($_SESSION['success']);
		}
	?>
	<form method="post" action="register.php">
		<label>Username:</label><br>
		<input type="text" name="username"><br>
		<label>Password:</label><br>
		<input type="password" name="password"><br>
		<label>Email:</label><br>
		<input type="email" name="email"><br><br>
		<input type="submit" value="Register">
	</form>
</body>
</html>
