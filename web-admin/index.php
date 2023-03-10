<?php 
    session_start();

    $menu = $_GET['menu'] ?? '';

    include('../functions/db/connection.php');
    include('../functions/upload/imgUpload.php');
    include('../functions/auth/login.php');

    //if not logged in redirect to login
    if(checkLoggedIn() == 0){
        $uri = 'http://'.$_SERVER['HTTP_HOST'].'/iag-media/web-admin/login.php';
        header("Location: $uri");
        die;
    }

    $sql = "SELECT * FROM details ORDER BY id DESC LIMIT 1";
    try {
        $result = $conn->query($sql);
        $doc = $result->fetch_assoc();

        $logo_img = $doc['logoUrl'];
    } catch (\Throwable $th) {
        throw $th;
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
    <link rel="stylesheet" href="../app/styles/admin_section.css">
    <title>IAG-Media | Ecommerce Marketing Agency</title>
    <meta name="description" content="We Help E-commerce &amp; Info Product Businesses By Producing Spine-Chilling ROI Via Paid Advertising. "/>
    <link rel="icon" type="image/x-icon" href="../assets/favicon.webp"/>
</head>
<body>
    <section class="w-admin__container">
        <div class="w-admin__container__menuside">
            <div class="w-admin__container__menuside__logocontainer">
                <a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/iag-media'; ?>"><img src="../assets/<?php echo $logo_img ?>"/></a>
            </div>
            <div class="w-admin__container__menuside__menuitemcontainer">
                <?php 
                if($menu == 'details' || $menu == ''){
                    echo '
                    <div class="w-admin__container__menuside__menuitemcontainer-item g-webadmin-selected_item">
                    Company Details
                    </div>
                    '; 
                }else{
                    echo '
                    <a href="?menu=details"><div class="w-admin__container__menuside__menuitemcontainer-item">
                    Company Details
                    </div></a>
                    '; 
                }
                ?>
                    
                <?php 
                if($menu == 'progress'){
                    echo '
                    <div class="w-admin__container__menuside__menuitemcontainer-item g-webadmin-selected_item">
                    Progress
                    </div>
                    '; 
                }else{
                    echo '
                    <a href="?menu=progress"><div class="w-admin__container__menuside__menuitemcontainer-item">
                    Progress
                    </div></a>'; 
                }
                ?>
                    
                <?php 
                if($menu == 'members'){
                    echo '
                    <div class="w-admin__container__menuside__menuitemcontainer-item g-webadmin-selected_item">
                    Team members
                    </div>
                    '; 
                }else{
                    echo '
                    <a href="?menu=members"><div class="w-admin__container__menuside__menuitemcontainer-item">
                    Team members
                    </div></a>
                    '; 
                }
                ?>
                    
            </div>
            <div class="w-admin__container__menuside-bottommenu">
                <div class="w-admin__container__menuside-bottommenu-item">
                    <form action="<?php echo htmlspecialchars('http://'.$_SERVER['HTTP_HOST'].'/iag-media/web-admin/logout.php'); ?>" method="post">
                        <input type="submit" value="Logout"/>
                    </form>
                </div>
            </div>
        </div>
        <div class="w-admin__container__contentside">
            <?php
            if($menu == 'details' || $menu == ''){
                include('../components/menu-details.php');
            }else if($menu == 'progress'){
                include('../components/menu-progress.php');
            }else if($menu == 'members'){
                include('../components/menu-members.php');
            }else{
                $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                $url = strtok($url, '?');

                header("Location: $url");
                die;
            }
            ?>
        </div>
    </section>
</body>
</html>