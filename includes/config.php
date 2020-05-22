<?php
    ob_start();
    session_start();
    $timezone = date_default_timezone_set("Asia/Kolkata");
    // connection variable for our database
    $con = mysqli_connect("localhost","root","","streamer");
    if(mysqli_connect_errno()){
        echo "Failed to connect : ".mysqli_connect_errno();
    }



?>