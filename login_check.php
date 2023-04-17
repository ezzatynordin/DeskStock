<?php
session_start();

if (isset($_POST['email']) && isset($_POST['password'])) {
    // TODO: sanitize input data to prevent SQL injection attacks

    // Replace the following variables with your own database credentials
    $host = 'localhost';
    $username = 'your_db_username';
    $password = 'your_db_password';
    $dbname = 'your_db_name';

    // Create a new PDO connection
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        die("ERROR: Could not connect. " . $e->getMessage());
    }

    // Prepare a SELECT statement to check if the user exists in the database
    $stmt = $pdo->prepare('SELECT * FROM users WHERE email = :email AND password = :password');
    $stmt->execute(['email' => $_POST['email'], 'password' => $_POST['password']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // User exists, set session variables and redirect to dashboard page
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        header('Location: index.php');
        exit();
    } else {
        // Invalid login credentials, display an error message
        $error_msg = 'Invalid email or password. Please try again.';
    }
}
?>
