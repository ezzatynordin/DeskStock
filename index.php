<!-- index.php -->

<!DOCTYPE html>
<html>
<head>
	<title>Login and Registration Form</title>
</head>
<body>
	<h2>Login Form</h2>
	<form method="post" action="login.php">
		<label>Username:</label><br>
		<input type="text" name="username"><br>
		<label>Password:</label><br>
		<input type="password" name="password"><br><br>
		<input type="submit" value="Login">
	</form>

	<h2>Registration Form</h2>
	<form method="post" action="register.php">
		<label>Username:</label><br>
		<input type="text" name="username"><br>
		<label>Email:</label><br>
		<input type="email" name="email"><br>
		<label>Password:</label><br>
		<input type="password" name="password"><br>
		<label>Confirm Password:</label><br>
		<input type="password" name="confirm_password"><br><br>
		<input type="submit" value="Register">
	</form>
</body>
</html>
