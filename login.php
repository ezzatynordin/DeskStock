<!-- login.php -->

<?php
	// start session
	session_start();

	// check if form submitted
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		// get form data
		$username = $_POST['username'];
		$password = $_POST['password'];

		// validate form data
		if (empty($username) || empty($password)) {
			// redirect to index.php with error message
			$_SESSION['error'] = 'Please enter username and password.';
			header('Location: index.php');
			exit;
		}

		// validate username and password
		// (replace this with your own authentication logic)
		if ($username == 'admin' && $password == 'password123') {
			// login successful, set session variable
			$_SESSION['username'] = $username;

			// redirect to dashboard.php
			header('Location: dashboard.php');
			exit;
		} else {
			// login failed, redirect to index.php with error message
			$_SESSION['error'] = 'Invalid username or password.';
			header('Location: index.php');
			exit;
		}
	} else {
		// if not submitted, redirect to index.php
		header('Location: index.php');
		exit;
	}
?>
