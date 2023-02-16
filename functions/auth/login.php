<?php

function login($username, $pwd){
    $admin_username = 'admin';
    $admin_pwd = 'admin@123';
    if($username == $admin_username && $pwd == $admin_pwd){
        return 1;
    }
    return 0;
}

function checkLoggedIn(){
    if(isset($_SESSION['username']) && isset($_SESSION['pwd'])){
        return login($_SESSION['username'],$_SESSION['pwd']);
    }else{
        return 0;
    }
}

?>