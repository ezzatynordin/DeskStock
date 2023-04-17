<?php
include 'config.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // $email = "ezzatybusuk@gmail.com";
    // $password = "1234";

    echo '$email';
    echo '$password';

    $sql = "SELECT * FROM [deskStock].[users] WHERE email = ?";
    $val = array($email);

    if (sqlsrv_query($conn, $sql, $val)) {
        echo 'Email address already registered';
    } else {
        $sql = "INSERT INTO [deskStock].[users] (email, password) VALUES (?,?)";
        $params = array($email, $password);
        if (sqlsrv_query($conn, $sql, $params)) {
            echo 'Registration successful. <a href="login.php">Click here to log in.</a>';
        } else {
            if (($errors = sqlsrv_errors()) != null) {
                foreach ($errors as $error) {
                    echo "SQLSTATE: " . $error['SQLSTATE'] . "<br />";
                    echo "code: " . $error['code'] . "<br />";
                    echo "message: " . $error['message'] . "<br />";
                }
            }
        }

    }
}
?>