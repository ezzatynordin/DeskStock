<?php
require_once 'config.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    //$email = $_POST['email'];
    //$password = $_POST['password'];

    $email = "ezzatybusuk@gmail.com";
    $password = "1234";

    $userData = array(
        'email' => $email,
        'password' => $password
    );

    echo '$email';
    echo '$password';

    $sql = "SELECT COUNT(*) AS count FROM users WHERE email = ?";
    $query = $conn->prepare($sql);
    $check = $query->execute(array($email));


    $row = $query->fetchAll(PDO::FETCH_ASSOC);

    if ($row['count'] > 0) {
        echo 'Email address already registered.';
    } else {
        $sql = "INSERT INTO users (email, password) VALUES (?,?)";
        $params = array(&$email, &$password);
        $query = $conn->prepare($sql);
        $insert = $query->execute($params);
        if (!($insert)) {
            echo 'Error inserting data';
        }
        echo 'Registration successful. <a href="login.php">Click here to log in.</a>';
    }
}
?>