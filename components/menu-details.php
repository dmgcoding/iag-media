<?php
    
    if($_SERVER["REQUEST_METHOD"]=="POST" ){
        $uri = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];//http:// + domain + path with query params

        $logoUrl = '';
        $email = $_POST['edit_details_contact_email'];
        $phone = $_POST['edit_details_company_number'];

        //upload img
        if(is_uploaded_file($_FILES['g-menu_details-entry-logo']['tmp_name'])){
            $imgUrlToSave = validateAndUploadImage($_FILES['g-menu_details-entry-logo']);
            if($imgUrlToSave !== 0){
                $logoUrl = $imgUrlToSave;
            }
        }

        $q1 = "SELECT id FROM details LIMIT 1";

        try {
            $result = $conn->query($q1);
            $onlyDoc = $result->fetch_assoc();
            $docId = $onlyDoc['id'];
        } catch (\Throwable $th) {
            $message = 'Error updating q1';
            $_SESSION['message'] = $message;
            header("Location: $uri");
            die;
            throw $th;
        }

        $sql = '';

        if($logoUrl == ''){
            $sql = "UPDATE details SET contact_email='$email', company_number='$phone' WHERE id=$docId";
        }else{
            $sql = "UPDATE details SET logoUrl='$logoUrl', contact_email='$email', company_number='$phone' WHERE id=$docId";
        }

        try {
            $conn->query($sql);
            $message = 'Data updated';
            $_SESSION['message'] = $message;
            header("Location: $uri");
            die;
        } catch (\Throwable $th) {
            $message = 'Error updating';
            $_SESSION['message'] = $message;
            header("Location: $uri");
            die;
            throw $th;
        }  
    }

    $sql = "SELECT * FROM details ORDER BY id DESC LIMIT 1";
    try {
        $result = $conn->query($sql);
        $doc = $result->fetch_assoc();

        $email_entry = $doc['contact_email'];
        $phone_entry = $doc['company_number'];
        $logo_img = $doc['logoUrl'];
    } catch (\Throwable $th) {
        throw $th;
    }
?>

<?php
    if(isset($_SESSION['message'])){
        echo "
        <div class='g-admin_section__message'>
            {$_SESSION['message']}
        </div>
        ";
        unset($_SESSION['message']);
    }
    // echo "<br>";
    // if(isset($_SESSION['errors'])){
    //     echo $_SESSION['errors'];
    //     unset($_SESSION['errors']);
    // }
?>

<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="post" enctype="multipart/form-data">
<div class="w-admin__container__contentside-title">
    Company Details
</div>
<div class="g-menu_details__item">
    <div class="g-menu_details__item-key">
        Logo
    </div>
    <div class="g-menu_details__item-entry">
        <div class="g-menu_details__item-entry-uploadbtn">
            upload image for logo
            <input name="g-menu_details-entry-logo" type="file"/>
        </div>
    </div>
</div>
<div class="g-menu_details__item">
    <div class="g-menu_details__item-key">
    Contact Email
    </div>
    <div class="g-menu_details__item-entry">
        <div class="g-menu_details__item-entry-inputfield">
            <input type="email" id="edit_details_contact_email" name="edit_details_contact_email" placeholder="Enter contact email" value="<?php echo $email_entry ?>" required/>
        </div>
    </div>
</div>
<div class="g-menu_details__item">
    <div class="g-menu_details__item-key">
    Company Number
    </div>
    <div class="g-menu_details__item-entry">
        <div class="g-menu_details__item-entry-inputfield">
            <input type="text" id="edit_details_company_number" name="edit_details_company_number" placeholder="Enter company number" value="<?php echo $phone_entry ?>" required/>
        </div>
    </div>
</div>

<div class="g-menu_members__savebtncontainer">
    <button type="submit">
        <div class="g-menu_members__savebtncontainer-savebtn">
            Save
        </div>
    </button>
</div>
</form>