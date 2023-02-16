<?php
session_start();

include('../functions/auth/login.php');

//when form submit
if($_SERVER['REQUEST_METHOD']=='POST'){
    $username = $_POST['login_username'];
    $pwd = $_POST['login_pwd'];

    $valid = login($username,$pwd);
    if($valid == 1){
        $_SESSION['username'] = $username;
        $_SESSION['pwd'] = $pwd;
        $uri = 'http://'.$_SERVER['HTTP_HOST'].'/iag-media/web-admin/';
        header("Location: $uri");
        die;
    }else{
        $_SESSION['error_msg'] = 'Wrong credentials';
        $uri = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        header("Location: $uri");
        die;
    }
}

//if logged in redirect to webadmin
if(checkLoggedIn() == 1){
    $uri = 'http://'.$_SERVER['HTTP_HOST'].'/iag-media/web-admin/';
    header("Location: $uri");
    die;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../app/styles/login.css">
    <title>IAG-Media | Ecommerce Marketing Agency</title>
    <meta name="description" content="We Help E-commerce &amp; Info Product Businesses By Producing Spine-Chilling ROI Via Paid Advertising. "/>
    <link rel="icon" type="image/x-icon" href="../assets/favicon.webp"/>
</head>
<body>
    <div class="w-login__container">
        <div class="w-login__container__box">
            <?php
            if(isset($_SESSION['error_msg'])){
                echo '<div class="w-login__container__box-msgbox">
                    ! '.$_SESSION['error_msg'].'
                </div>';
                unset($_SESSION['error_msg']);
            }
            ?>
            
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="w-login__container__box-title">
                    Login for admin panel
                </div>
                <input type="text" name="login_username" placeholder="Enter your username" required/>
                <input type="password" name="login_pwd" placeholder="Enter your password" required/>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>