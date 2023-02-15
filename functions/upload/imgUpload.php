<?php 

function validateAndUploadImage($file){
    $target_dir = '../assets/';
    $filename = rand(1000,500000).'_'.basename($file['name']);
    $target_file = $target_dir.$filename;
    // $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $valid = getimagesize($file['tmp_name']);
    
    if(!$valid){
        return 0;
    }

    if(move_uploaded_file($file['tmp_name'],$target_file)){
        return $filename;
    }else{
        $_SESSION['errors'] = 'error in saving image';
        return 0;
    }

    

}

?>