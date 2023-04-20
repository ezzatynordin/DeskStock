<?php

//if($_GET['success'] == 'true')
//{ echo '<script> alert("Registration Success"); </script>'; }

// Connect to the database
include 'config.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the email and password from the form
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Query the database to check if the user is registered
    $query = "SELECT * FROM users WHERE email = ? AND password = ?";
    $params = array($email, $password);
    $result = sqlsrv_query($conn, $query, $params);

    // If the query returns a row, the user is registered and can be logged in
    if (sqlsrv_has_rows($result)) {
        // Start the session and store the user's email
        session_start();
        $_SESSION["email"] = $email;

        // Redirect the user to the dashboard
        header("Location: dashboard.php");
        exit();
    } else {
        // Set an error message if the user is not registered
        $errorMessage = "Invalid email or password.";
        // Call the JavaScript function to show the error message
       // echo '<script>alert("' . $errorMessage . '");</script>';
        echo '<script>alert("' . $errorMessage . '"); window.location.href = "login.php";</script>';

    }
}

?>