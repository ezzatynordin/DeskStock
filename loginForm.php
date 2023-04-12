<!-- loginForm.php -->

<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
</head>
<body>
	<h2>Login Form</h2>
	<?php
		// start session
		session_start();

		// check for error message
		if (isset($_SESSION['error'])) {
			echo '<p style="color:red;">' . $_SESSION['error'] . '</p>';
			unset($_SESSION['error']);
		}
	?>
	<form method="post" action="login.php">
		<label>Username:</label><br>
		<input type="text" name="username"><br>
		<label>Password:</label><br>
		<input type="password" name="password"><br><br>
		<input type="submit" value="Login">
	</form>
</body>
</html>
