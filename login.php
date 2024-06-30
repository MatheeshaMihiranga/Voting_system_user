<?php session_start(); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign In</title>
    <link rel="stylesheet" href="login.css" />
</head>

<body>
    <div class="logbox">
        <div class="login-box">
            <form action="includes/login.inc.php" method="POST">
                <div class="signInLogoMain">
                    <img class="signInLogo" src="Images/logo-no-background.png" />
                </div>
                <br />
                <br />
                <h2>Sign in to Silver Voice</h2>

                <div class="input-box">
                    <input name="email" type="email" required />
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <input name="pwd" type="password" required />
                    <label>Password</label>
                </div>
                <br />
                <br />
                <button name="submit" type="submit">Login</button>
                <div class="register-link">
                    <p>Don't have an account <a href="signup.php">Register</a></p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>