<?php
session_start();

include('../functions/auth/login.php');


if($_SERVER['REQUEST_METHOD']=='POST'){
    unset($_SESSION['username']);
    unset($_SESSION['pwd']);
    $uri = 'http://'.$_SERVER['HTTP_HOST'].'/iag-media/web-admin/login.php';
    header("Location: $uri");
    die;
}

//if get request-> redirect to login
$uri = 'http://'.$_SERVER['HTTP_HOST'].'/iag-media/web-admin/login.php';
header("Location: $uri");
die;

?>