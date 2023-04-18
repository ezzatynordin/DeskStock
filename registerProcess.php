<?php

// Include database configuration here
include 'config.php';


// Here we check if email and password is not null (passed from the form properly)
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Do a query here to check if the email already present or not
    $sql = "SELECT * FROM users WHERE email = ?";
    $params = array($email);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if (sqlsrv_has_rows($stmt)) {
        //If email already present, display this message
        echo 'Email address already registered';
    } else {
        //If email not present, then insert registration details to our database
        $sql = "INSERT INTO users (email, password) VALUES (?,?)";

        // This params is responsible to pass value to the query above with ? mark. Why use this method? To avoid sql injection
        $params = array($email, $password);

        // Initiate query to database
        if (sqlsrv_query($conn, $sql, $params)) {
            // If success, display this message.
            // echo 'Registration successful. <a href="login.php">Click here to log in.</a>';
            //echo '<script> alert("Registration Successful"); </script>';
            echo '<script> alert("Registration Success"); </script>';
            header("Location:login.php");
            exit;
        } else {
            // If error occured when querying the database, display the error for debugging purpose.
            if (($errors = sqlsrv_errors()) != null) {
                foreach ($errors as $error) {
                    echo "SQLSTATE: " . $error['SQLSTATE'] . "<br />";
                    echo "code: " . $error['code'] . "<br />";
                    echo "message: " . $error['message'] . "<br />";
                }
            }
        }

    }
} else {
    echo 'No data passed from the form!.';
}

sqlsrv_close($conn);

?>
