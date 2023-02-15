<?php
    
    if($_SERVER["REQUEST_METHOD"]=="POST" ){
        $uri = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];//http:// + domain + path with query params

        $imgUrl = '';
        $name_entry = $_POST['edit_members_name'];
        $role_entry = $_POST['edit_members_role'];

        //upload img
        if(is_uploaded_file($_FILES['g-menu_details-entry-img']['tmp_name'])){
            $imgUrlToSave = validateAndUploadImage($_FILES['g-menu_details-entry-img']);
            if($imgUrlToSave !== 0){
                $imgUrl = $imgUrlToSave;
            }else{
                $message = 'Error uploading image';
                $_SESSION['message'] = $message;
                header("Location: $uri");
                die;
            }
        }

        $sql = "INSERT INTO members(name,role,imgUrl) VALUES('$name_entry','$role_entry','$imgUrl')";

        try {
            $conn->query($sql);
            $message = 'New member added';
            $_SESSION['message'] = $message;
            header("Location: $uri");
            die;
        } catch (\Throwable $th) {
            $message = 'Error adding member';
            $_SESSION['message'] = $th;
            header("Location: $uri");
            die;
            throw $th;
        }  
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
    echo "<br>";
    if(isset($_SESSION['errors'])){
        echo $_SESSION['errors'];
        unset($_SESSION['errors']);
    }
?>

<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="post" enctype="multipart/form-data">
<div class="w-admin__container__contentside-title">
Team Members
</div>

<?php

$sql = "SELECT * FROM members";
try {
    $result = $conn->query($sql);
    
} catch (\Throwable $th) {
    throw $th;
}

while($row = $result->fetch_assoc()){
    $img = $row['imgUrl'];
    $name = $row['name'];
    $role = $row['role'];

    echo "
    <div class='g-menu_members-memberbox'>
        <img class='g-memberimg' src='../assets/$img'/>
        <div class='g-menu_members-memberbox__content'>
            <div class='g-menu_members-memberbox__content-name'>
            $name
            </div>
            <div class='g-menu_members-memberbox__content-role'>
            $role
            </div>
        </div>
    </div>
    ";
}
?>
<div style="min-height: 30px;"></div>

<div class="w-admin__container__contentside-title">
Add a new member
</div>
<div class="g-menu_members__item">
    <div class="g-menu_members__item-key">
    Name
    </div>
    <div class="g-menu_members__item-entry">
        <div class="g-menu_members__item-entry-inputfield">
            <input type="text" id="edit_members_name" name="edit_members_name" placeholder="new member's name" required/>
        </div>
    </div>
</div>
<div class="g-menu_members__item">
    <div class="g-menu_members__item-key">
    Role
    </div>
    <div class="g-menu_members__item-entry">
        <div class="g-menu_members__item-entry-inputfield">
            <input type="text" id="edit_members_role" name="edit_members_role" placeholder="new member's role" required/>
        </div>
    </div>
</div>
<div class="g-menu_members__item">
    <div class="g-menu_members__item-key">
    Image
    </div>
    <div class="g-menu_members__item-entry">
        <div class="g-menu_members__item-entry-uploadbtn">
            upload image for new member
            <input name="g-menu_details-entry-img" type="file" required/>
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