<!-- dashboard.php -->

<?php
	// start session
	session_start();

	// check if user is logged in
	if (!isset($_SESSION['username'])) {
		// redirect to loginForm.php
		header('Location: loginForm.php');
		exit;
	}

	// get username from session variable
	$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
</head>
<body>
	<h2>Welcome, <?php echo $username; ?></h2>
	<p>This is your dashboard.</p>
	<p><a href="logout.php">Logout</a></p>
</body>
</html>
