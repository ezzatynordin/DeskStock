<!-- register.php -->

<?php
	// start session
	session_start();

	// check if form submitted
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		// get form data
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];

		// validate form data
		if (empty($username) || empty($password) || empty($email)) {
			// redirect to index.php with error message
			$_SESSION['error'] = 'Please fill all required fields.';
			header('Location: index.php');
			exit;
		}

		// validate username and email
		// (replace this with your own validation logic)
		// for example, check if username and email already exist in the database
		if ($username == 'admin') {
			// username already exists, redirect to index.php with error message
			$_SESSION['error'] = 'Username already exists.';
			header('Location: index.php');
			exit;
		} elseif ($email == 'admin@example.com') {
			// email already exists, redirect to index.php with error message
			$_SESSION['error'] = 'Email already exists.';
			header('Location: index.php');
			exit;
		}

		// registration successful, redirect to loginForm.php with success message
		$_SESSION['success'] = 'Registration successful. Please login to continue.';
		header('Location: loginForm.php');
		exit;
	} else {
		// if not submitted, redirect to index.php
		header('Location: index.php');
		exit;
	}
?>
