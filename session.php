<?php

if(!(function_exists('db_connect'))){
    // my_function is defined
    include('database.php');
}

$login_session;
$loggedIn = false;

session_start();

if(isset($_SESSION['login_user'])){

    $user_check = $_SESSION['login_user'];

    $sesQuery = "SELECT * FROM `User` WHERE `Username` ='" . $user_check . "'";

    $sesResult = db_query($sesQuery);
    $row = mysqli_fetch_array($sesResult,MYSQLI_ASSOC);


    $login_session = $row['Username'];
    $loggedIn = true;
}


?>