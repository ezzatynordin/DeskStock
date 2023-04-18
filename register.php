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
    <form method="POST" action="registerProcess.php">
        <div class= "wrapper">
            <div class="container main">
                <div class="row">
                    <div class="col-md-6 side-image">
                        <div class="text">
                            <p>Welcome To DeskStock System</p>
                        </div>
                    </div>
                    <div class="col-md-6 right">
                        <div class="input-box">
                            <header>Create account</header>
                            <div class="input-field">
                                <input type="text" class="input" id="email" required autocomplete="off">
                                <label for="email">Email</label>
                            </div>
                            <div class="input-field">
                                <input type="password" class="input" id=password required>
                                <label for="password">password</label>
                            </div>
                            <div class="input-field">
                                <input type="submit" class="submit" value="Sign up">
                            </div>
                        </form>
                            <div class="signin">
                                <span>Already have an account? <a href="login.php">Log in here</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </body>
    </html>
