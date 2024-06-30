<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up</title>
    <link rel="stylesheet" href="signup.css" />
</head>

<body>
    <div class="logbox">
        <div class="login-box">
            <form action="includes/signup.inc.php" method="post">
                <div class="signInLogoMain">
                    <img class="signInLogo" src="Images/logo-no-background.png">
                </div>
                <br />
                <br />
                <h2>Create an Account</h2>
                <br />
                <div class="input-box">
                    <input name="firstname" type="text" required />
                    <label>FirstName</label>
                </div>
                <div class="input-box">
                    <input name="lastname" type="text" required />
                    <label>LastName</label>
                </div>
                <div class="input-box">
                    <input type="text" name="dateofbirth" onfocus="(this.type='date')" onblur="if(!this.value) this.type='text'" required />
                    <label>Date of Birth</label>
                </div>
                <div class="input-box">
                    <input name="country" type="text" required />
                    <label>Country</label>
                </div>
                <div class="input-box">
                    <input name="email" type="email" required />
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <input name="pwd" type="password" required />
                    <label>Password</label>
                </div>
                <div class="input-box">
                    <input name="pwdConfirm" type="password" required />
                    <label>Confirm Password</label>
                </div>
                <br />
                <br />
                <br />
                <button name="submit" type="submit">Sign Up</button>
                <div class="register-link">
                    <p>Already hava an Account <a href="login.php">Sign in
                            <Input:date></Input:date>
                        </a></p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>