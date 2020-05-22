<?php
    include('includes/config.php');
    if(isset($_SESSION['userLoggedIn'])){
        $userLoggedIn=$_SESSION['userLoggedIn'];
    }else{
        header("Location:register.php");
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Streamer | Stream and Feel Music</title>
</head>
<body>
    This is working
</body>
</html>