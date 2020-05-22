<?php
    include("includes/handlers/register-handler.php");
    include("includes/handlers/login-handler.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <div id="inputContainer">
        <!-- Start of login Form -->
        <form action="register.php" id="loginForm" method="POST">
            <h2>Login to your account</h2>
            <p>
                <label for="loginUsername">Username</label>
                <input type="text" id="loginUsername" name="loginUsername" placeholder="Username" required>
            </p>
            <p>
                <label for="loginPassword">Password</label>
                <input type="password" id="loginPassword" name="loginPassword" placeholder="password" required>
            </p>
            <button type="submit" name="loginButton">Login</button>
        </form>
        <!-- End of Login Form -->
        <!-- Start  of Register form -->
        <form action="register.php" id="registerForm" method="POST">
            <h2>Create Your Free Streamer Account</h2>
            <p>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Username" required>
            </p>
            <p>
                <label for="firstname">First Name </label>
                <input type="text" id="firstname" name="firstname"  placeholder="eg Bart" required>
            </p>
            <p>
                <label for="lastname">Last Name</label>
                <input type="text" id="lastname" name="lastname" placeholder="eg simpson" required>
            </p>
            <p>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="eg bart@example.com" required>
            </p>
            <p>
                <label for="email2">Confirm Email</label>
                <input type="email" id="email2" name="email2" placeholder="bart@example.com" required>
            </p>
            <p>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="your password" required>
            </p>
            <p>
                <label for="password2">Confirm Password</label>
                <input type="password" id="password2" name="password2" placeholder="your password" required>
            </p>
            <button type="submit" name="registerButton">Register</button>
        </form>
        <!-- End of register form -->
    </div>
</body>
</html>