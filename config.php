<?php
$serverName = "F1-LAPTOP-MPC\SQLEXPRESS";
$connectionInfo = array( "Database"=>"DeskStock");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if (!$conn) {
    die('Connection failed: '.print_r( sqlsrv_errors(), true));
}

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT COUNT(*) AS count FROM users WHERE email = '$email'";
    $stmt = sqlsrv_query($conn, $sql);
    if ($stmt === false) {
        die('Query failed: '.print_r( sqlsrv_errors(), true));
    }

    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    if ($row['count'] > 0) {
        echo 'Email address already registered.';
    } else {
        $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
        $stmt = sqlsrv_query($conn, $sql);
        if ($stmt === false) {
            die('Query failed: '.print_r( sqlsrv_errors(), true));
        }
        echo 'Registration successful. <a href="login.php">Click here to log in.</a>';
    }
}
?>
