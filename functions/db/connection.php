<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'iag_media';

if(!$conn = mysqli_connect($db_host,$db_user,$db_pass,$db_name)){
    die('error in connecting to db');
}

?>