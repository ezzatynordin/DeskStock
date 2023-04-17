<?php
$serverName = "F1-LAPTOP-MPC\SQLEXPRESS";
$connectionInfo = array( "Database"=>"deskStock");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if (!$conn) {
    die('Connection failed: '.print_r( sqlsrv_errors(), true));
}

if (isset($_POST['email']) && isset($_POST['password'])) {
    //$email = $_POST['email'];
    //$password = $_POST['password'];

    $email = "ezzatybusuk@gmail.com";
    $password = "1234";

    echo($email);
    echo($password);

    $sql = "SELECT COUNT(*) AS count FROM users WHERE email = (?)";
    $params = array($email);
    $stmt = sqlsrv_query($conn, $sql, $params);
    if ($stmt === false) {
        die('Query failed: '.print_r( sqlsrv_errors(), true));
    }

    sqlsrv_free_stmt($stmt);

    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    if ($row['count'] > 0) {
        echo 'Email address already registered.';
    } else {
        $sql = "INSERT INTO users (email, password) VALUES (?,?)";
        $params = array($email, $password);
        $stmt = sqlsrv_query($conn, $sql, $params);
        if ($stmt === false) {
            die('Query failed: '.print_r( sqlsrv_errors(), true));
        }
        sqlsrv_free_stmt($stmt);
        echo 'Registration successful. <a href="login.php">Click here to log in.</a>';
    }
}
?>
