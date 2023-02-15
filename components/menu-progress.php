
<?php 

    //handle post
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $uri = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];//http:// + domain + path with query params

        $clients_helped = $_POST['edit_progress_clients_helped'];
        $total_ad_spent = $_POST['edit_progress_ad_spent'];
        $number_of_offices = $_POST['edit_progress_offices'];
        $services = $_POST['edit_progress_services'];

        if($conn->connect_error){
            $msg = 'Error connecting to db';
            $_SESSION['message'] = $msg;

            header("Location: $uri");
            die;
        }

        $sql = 'INSERT INTO progress(clients_helped,total_ad_spent,number_of_offices,services_offer) VALUES(?,?,?,?)';

        try {
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ssss',$clients_helped,$total_ad_spent,$number_of_offices,$services);
            $stmt->execute();

            $msg = 'Data updated!';
            $_SESSION['message'] = $msg;
            header("Location: $uri");
            die;
        } catch (\Throwable $th) {
            throw $th;
            $msg = "Error saving data.";
            $_SESSION['message'] = $msg;

            header("Location: $uri");
            die;
        }
    }

    //load data from db to show in entries
    $clients_helped = '';
    $total_ad_spent = '';
    $number_of_offices = '';
    $services = '';

    $sql = "SELECT * FROM progress ORDER BY id DESC LIMIT 1";
    try {
        $result = $conn->query($sql);
        $doc = $result->fetch_assoc();

        $clients_helped = $doc['clients_helped'];
        $total_ad_spent = $doc['total_ad_spent'];
        $number_of_offices = $doc['number_of_offices'];
        $services = $doc['services_offer'];
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
?>

<form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" method="post">
<div class="w-admin__container__contentside-title">
Progress
</div>
<div class="g-menu_progress__item">
    <div class="g-menu_progress__item-key">
    Clients Helped
    </div>
    <div class="g-menu_progress__item-entry">
        <div class="g-menu_progress__item-entry-inputfield">
            <input type="number" id="edit_progress_clients_helped" name="edit_progress_clients_helped" placeholder="" value="<?php echo $clients_helped; ?>" required/>
        </div>
    </div>
</div>
<div class="g-menu_progress__item">
    <div class="g-menu_progress__item-key">
    Total Ad Spent (X Million USD)
    </div>
    <div class="g-menu_progress__item-entry">
        <div class="g-menu_progress__item-entry-inputfield">
            <input type="number" id="edit_progress_ad_spent" name="edit_progress_ad_spent" placeholder="<?php echo $total_ad_spent; ?>" value="<?php echo $total_ad_spent; ?>" required/>
        </div>
    </div>
</div>
<div class="g-menu_progress__item">
    <div class="g-menu_progress__item-key">
    Number of offices
    </div>
    <div class="g-menu_progress__item-entry">
        <div class="g-menu_progress__item-entry-inputfield">
            <input type="number" id="edit_progress_offices" name="edit_progress_offices" placeholder="" value="<?php echo $number_of_offices; ?>" required/>
        </div>
    </div>
</div>
<div class="g-menu_progress__item">
    <div class="g-menu_progress__item-key">
    Services Offer
    </div>
    <div class="g-menu_progress__item-entry">
        <div class="g-menu_progress__item-entry-inputfield">
            <input type="number" id="edit_progress_services" name="edit_progress_services" placeholder="" value="<?php echo $services; ?>" required/>
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