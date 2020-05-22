<?php
    include('includes/classes/Account.php');
    include('includes/classes/Constants.php');

    $account=new Account();

    include("includes/handlers/register-handler.php");
    include("includes/handlers/login-handler.php");

    //function to remember the form value
    function getInputValue($name){
        if(isset($_POST[$name])){
            echo $_POST[$name];
        }
    }
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
                <?php echo $account->getError(Constants::$userNameCharacters); ?>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Username" value="<?php
               getInputValue('username'); ?>" required>
            </p>
            <p>
                <?php echo $account->getError(Constants::$firstNameCharacters); ?>
                <label for="firstname">First Name </label>
                <input type="text" id="firstname" name="firstname"  placeholder="eg Bart" value="<?php
               getInputValue('firstname'); ?>" required>
            </p>
            <p>
                <?php echo $account->getError(Constants::$lastNameCharacters); ?>
                <label for="lastname">Last Name</label>
                <input type="text" id="lastname" name="lastname" placeholder="eg simpson" value="<?php
               getInputValue('lastname'); ?> "required>
            </p>
            <p>
                <?php echo $account->getError(Constants::$emailInvalid); ?>
                <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="eg bart@example.com" value="<?php
               getInputValue('email'); ?>" required>
            </p>
            <p>
                <?php echo $account->getError(Constants::$emailInvalid); ?>
                <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
                <label for="email2">Confirm Email</label>
                <input type="email" id="email2" name="email2" placeholder="bart@example.com" value="<?php
               getInputValue('email2'); ?>" required>
            </p>
            <p>
                <?php echo $account->getError(Constants::$passwordNotAlphaNumeric); ?>
                <?php echo $account->getError(Constants::$passwordCharacters); ?>
                <?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
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