<?php
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
        echo '<script>alert("' . $errorMessage . '");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap-5.3.0-alpha3-dist/css/bootstrap.min.css">
    <title>DeskStock</title>
</head>
<body>
    <div class= "wrapper">
        <div class="container main">
            <div class="row">
                <div class="col-md-6 side-image">
                    <div class="text">
                        <p>Welcome To DeskStock System</p>
                    </div>
                </div>
                <div class="col-md-6 right">
                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="input-box">
                            <header>Login Form</header>
                            <div class="input-field">
                                <input type="text" class="input" id="email" name="email" required autocomplete="off">
                                <label for="email">Email</label>
                            </div>
                            <div class="input-field">
                                <input type="password" class="input" id=password name="password" required>
                                <label for="password">Password</label>
                            </div>
                            <div class="input-field">
                                <input type="submit" class="submit" value="Login">
                            </div>
                            <div class="signin">
                                <span>Don't have an account? <a href="register.php">Register here</a></span>
                            </div>
                            <!-- Remove the PHP code for error message -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

