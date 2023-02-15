<?php 

function validateAndUploadImage($file){
    $target_dir = '../../assets/';
    $target_file = $target_dir.basename($file['name']);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $valid = getimagesize($file['tmp_name']);
    
    if(!$valid){
        return 0;
    }

    return basename($file['name']);

}

?>