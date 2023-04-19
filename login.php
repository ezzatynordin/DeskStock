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
<form method="POST" action="loginProcess.php">
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
</form>
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

