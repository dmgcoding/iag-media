<?php 

include("functions/db/connection.php");
//load site data
    //business details
    $q1 = "SELECT * FROM details ORDER BY id DESC LIMIT 1";
    $logo_img = '';
    $contact_email = '';
    $company_number = '';
    try {
        $result = $conn->query($q1);
        while($row=$result->fetch_assoc()){
            $logo_img = $row['logoUrl'];
            $contact_email = $row['contact_email'];
            $company_number = $row['company_number'];
        }
    } catch (\Throwable $th) {
        throw $th;
        die;
    }
    
    //progress
    $total_ad_spent = '';	
    $number_of_offices = '';	
    $services_offer = '';	
    $clients_helped	= '';
    $q2 = "SELECT * FROM progress ORDER BY id DESC LIMIT 1";
    
    try {
        $result = $conn->query($q2);
    
        while($row=$result->fetch_assoc()){
            $total_ad_spent = $row['total_ad_spent'];	
            $number_of_offices = $row['number_of_offices'];	
            $services_offer = $row['services_offer'];	
            $clients_helped	= $row['clients_helped'];
        }
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
    <link rel="stylesheet" href="app/styles/home.css">
    <title>IAG-Media | Ecommerce Marketing Agency</title>
    <meta name="description" content="We Help E-commerce &amp; Info Product Businesses By Producing Spine-Chilling ROI Via Paid Advertising. "/>
    <link rel="icon" type="image/x-icon" href="assets/favicon.webp"/>
</head>
<body>
    <!-- header -->
    <div class="w-home__header">
        <a href="<?php echo $_SERVER['REQUEST_URI'] ?>"><img src="assets/<?php echo $logo_img ?>" class="g-logo"/></a>
    </div>

    <div class="w-home__cover">
        <div class="w-home__cover-left">
            <div class="w-home__cover-left-subheading">MODERN DAY ALCHEMY</div>
            <div class="w-home__cover-left-heading">
            We Help E-commerce & Info Product Businesses Produce Spine-Chilling ROI Via Paid Advertising
            </div>
            <p class="w-home__cover-left-para">
            Stop wasting time and money on faulty and ineffective ad campaigns.

            It's time to make your ad-budget count, scale your business and blow up your sales.
            </p>
            <div class="g-speaktoteambtncontainer">
                <div class="g-speaktoteambtn">
                    <div class="g-speaktoteambtn-text">Speak to our team today</div>
                    <div class="g-speaktoteambtn-subtext">Schedule your FREE audit call now</div>
                </div>
            </div>
        </div>
        <div class="w-home__cover-right">
            <div class="w-home__cover-right__image">
                <img src="assets/wizard.webp" />
            </div>
        </div>
    </div>

    <div class="w-home__stats">
        <div class="w-home__stats__container">
            <div class="w-home__stats__container-left">
                <div class="w-home__stats__container-left__subheading">
                TOTAL REVENUE GENERATED
                </div>
                <div class="w-home__stats__container-left__heading">
                $63.4 MILLION
                </div>
                <div class="w-home__stats__container-left__statboxcontainer">
                    <div class="w-home__stats__container-left__statboxcontainer-box">
                        <div class="w-home__stats__container-left__statboxcontainer-box__container">
                            <div class="w-home__stats__container-left__statboxcontainer-box__container-title">
                            CLIENTS HELPED
                            </div>
                            <div class="w-home__stats__container-left__statboxcontainer-box__container-number">
                            <?php echo $clients_helped; ?>
                            </div>
                        </div>
                    </div>
                    <div class="w-home__stats__container-left__statboxcontainer-box">
                        <div class="w-home__stats__container-left__statboxcontainer-box__container">
                            <div class="w-home__stats__container-left__statboxcontainer-box__container-title">
                            TOTAL AD SPENT
                            </div>
                            <div class="w-home__stats__container-left__statboxcontainer-box__container-number">
                            $<?php echo $total_ad_spent; ?> M
                            </div>
                        </div>
                    </div>
                    <div class="w-home__stats__container-left__statboxcontainer-box">
                        <div class="w-home__stats__container-left__statboxcontainer-box__container">
                            <div class="w-home__stats__container-left__statboxcontainer-box__container-title">
                            OFFICES
                            </div>
                            <div class="w-home__stats__container-left__statboxcontainer-box__container-number">
                            <?php echo $number_of_offices; ?>
                        </div>
                        </div>
                    </div>
                    <div class="w-home__stats__container-left__statboxcontainer-box">
                        <div class="w-home__stats__container-left__statboxcontainer-box__container">
                            <div class="w-home__stats__container-left__statboxcontainer-box__container-title">
                            SERVICES OFFER
                            </div>
                            <div class="w-home__stats__container-left__statboxcontainer-box__container-number">
                            <?php echo $services_offer; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-home__stats__container-right">
                <h3>Our Philosophy</h3>
                <p>Here at IAG Media, we've worked with the best in the industry to produce millions of dollars in return on ad spend. We do away with the the inefficiencies & formalities that plague most agencies.

                Our client case studies have become myth, our waiting list is longer than your complaints with your current agency and we look for a very specific kind of client.</p>
                <div class="w-home__stats__container-right-boldtext">
                Maybe that’s you: it would be our honour to find out. Schedule your FREE discovery call below.
                </div>
                <div class="g-speaktoteambtncontainer">
                <div class="g-speaktoteambtn">
                    <div class="g-speaktoteambtn-text">Speak to our team today</div>
                    <div class="g-speaktoteambtn-subtext">Schedule your FREE audit call now</div>
                </div>
            </div>
            </div>
        </div>
    </div>

    <div class="w-home__whatweoffer">
        <div class="w-home__whatweoffer__container">
            <div class="w-home__whatweoffer__container-left">
                <div class="g-textblock">
                    <h5>What we offer</h5>
                    <h3>PAID ADVERTISING</h3>
                    <p>
                    Ads, Just Ads.

                    We do one thing - we just do it with a monastic focus and better than anyone else. If you want an agency that offers a full service solution of everything that won’t move the needle forward, we’re not for you.

                    If you want an agency where with two clicks, you can get a clear breakdown of how much was spent, how much was made & what your net profit was - we’re for you.
                    </p>
                    <div class="g-speaktoteambtncontainer" style="margin:20px 0 0 0">
                    <div class="g-speaktoteambtn">
                        <div class="g-speaktoteambtn-text">Speak to our team today</div>
                        <div class="g-speaktoteambtn-subtext">Schedule your FREE audit call now</div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="w-home__whatweoffer__container-right">
                <div class="w-home__whatweoffer__container-right__heading">
                MASTERY DEMANDS FOCUS SO....
                </div>
                <div class="w-home__whatweoffer__container-right__para">
                We don't offer any other services except for paid advertising...
                </div>
                
                <div class="w-home__whatweoffer__container-right__offeritem">
                    <img src="assets/close icon.png"/>
                    <span>WEBDESIGN</span>
                </div>
                <div class="w-home__whatweoffer__container-right__offeritem">
                    <img src="assets/close icon.png"/>
                    <span>CONTENT CREATION</span>
                </div>
                <div class="w-home__whatweoffer__container-right__offeritem">
                    <img src="assets/close icon.png"/>
                    <span>EMAIL MARKETING</span>
                </div>
                <div class="w-home__whatweoffer__container-right__offeritem">
                    <img src="assets/close icon.png"/>
                    <span>SOCIAL MEDIA MANAGEMENT</span>
                </div>
                <div class="w-home__whatweoffer__container-right__offeritem">
                    <img src="assets/close icon.png"/>
                    <span>INSTAGRAM GROWTH</span>
                </div>
                <div class="w-home__whatweoffer__container-right__offeritem">
                    <img src="assets/close icon.png"/>
                    <span>​PR SERVICE</span>
                </div>
            </div>
        </div>
    </div>

    <div class="w-home__clients">
        <div class="w-home__clients__container">
            <h1>Companies That Trust Us</h1>
            <div class="w-home__clients__container-logoscontainer">
                <img src="assets/OURA.png"/>
                <img src="assets/AJ-SMART.png"/>
                <img src="assets/KEVINROSE.png"/>
                <img src="assets/IKNK.png"/>
                <img src="assets/EVARAE.png"/>
                <img src="assets/GROWYOURAGENCY.png"/>
            </div>
        </div>
    </div>

    <div class="w-home__team">
        <div class="w-home__team__container">
            <div class="w-home__team__container-left">
                <?php

                $sql = "SELECT * FROM members ORDER BY id LIMIT 4";
                try {
                    $result = $conn->query($sql);
                    
                } catch (\Throwable $th) {
                    throw $th;
                }

                while($row = $result->fetch_assoc()){
                    $img = $row['imgUrl'];
                    $name = $row['name'];
                    $role = $row['role'];

                    echo '
                    <div class="w-home__team__container-left-memberbox">
                        <img class="g-memberimg" src="assets/'.$img.'"/>
                        <div class="w-home__team__container-left-memberbox-name">'
                        .$name.
                        '</div>
                        <div class="w-home__team__container-left-memberbox-role">'
                        .$role.'
                        </div>
                    </div>
                    ';
                }
                ?>
            </div>
            <div class="w-home__team__container-right">
                <div class="g-textblock">
                    <h3>Meet The A-Team</h3>
                    <p>Founded by Iman Gadzhi who's spent the past 4 years attracting the best talent globally.

                    With our elusive company culture, calibre of clientele & Iman’s social media in the hundreds of thousands - IAG Media has our pick of the litter all across the world when it comes to who we’re able to hire. The team you see in front of you is a culmination of that.
                    </p>
                    <div class="g-speaktoteambtncontainer" style="margin:20px 0 0 0">
                    <div class="g-speaktoteambtn">
                        <div class="g-speaktoteambtn-text">Speak to our team today</div>
                        <div class="g-speaktoteambtn-subtext">Schedule your FREE audit call now</div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-home__bookacall">
        <div class="w-home__bookacall__container">
            <div class="w-home__bookacall__container-left">
                <img src="assets/calendar.png"/>
            </div>
            <div class="w-home__bookacall__container-right">
                <img class="g-memberimg" src="assets/dany.jpg"/>
                <div class="w-home__bookacall__container-right-subheading">
                SCHEDULE YOUR CALL WITH DANY
                </div>
                <div class="w-home__bookacall__container-right-heading">
                Free 15-Minute Demo Call
                </div>
                <p>
                By the end of this Audit call, you will have a clear understanding of the next steps you can take for your business to start generating consistent and reliable results online with Funnels & Paid Advertising.

                Find a time on Dany’s calendar to schedule your call today and we look forward to speaking to you soon!
                </p>
                <div class="w-home__bookacall__container-right-heading__benefitbox">
                    <h3 class="">
                    THIS AUDIT CALL IS PERFECT FOR:
                    </h3>
                    <div class="w-home__bookacall__container-right-heading__benefitbox-item">
                        <img src="assets/tickbox.png"/>
                        <p>Businesses looking to convert their current website into a <span>high quality & streamlined funnel format.</span></p>
                    </div>
                    <div class="w-home__bookacall__container-right-heading__benefitbox-item">
                        <img src="assets/tickbox.png"/>
                        <p>Businesses looking to take their offline business <span>online</span></p>
                    </div>
                    <div class="w-home__bookacall__container-right-heading__benefitbox-item">
                        <img src="assets/tickbox.png"/>
                        <p>Businesses looking to understand their <span>increased revenue potential</span> with funnels & conversion rate optimization.</p>
                    </div>
                    <div class="w-home__bookacall__container-right-heading__benefitbox-item">
                        <img src="assets/tickbox.png"/>
                        <p>Businesses looking to <span>maximize their conversion rates & average order value.</span></p>
                    </div>
                    <div class="w-home__bookacall__container-right-heading__benefitbox-item">
                        <img src="assets/tickbox.png"/>
                        <p>Businesses looking for a reliable agency that can <span>make their company a priority.</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-home__freecasestudy">
        <div class="w-home__freecasestudy__container">
            <h4>FREE CASE STUDY:</h4>
            <h2>
                "How My Agency Is Helping 'New Breed' Info Product & Ecommerce Businesses Scale Aggressively"
            </h2>
            <div class="w-home__freecasestudy__container__block">
                <div class="w-home__freecasestudy__container__block-left">
                    <img src="assets/gif.gif"/>
                </div>
                <div class="w-home__freecasestudy__container__block-right">
                    <p>How we consistently generate spine chilling ROI for our clients.

                    How to achieve 'god like' omni-presence & dominate your competition.

                    Why you need to 'plug the holes' in your sales process before you can drive traffic.
                    </p>
                    <div style="display:flex;" class="w-home__freecasestudy__container__block-right__btncontainer">
                        <div class="w-home__freelancecasestudy__container__block-right__btn">
                        WATCH THE FREE CASESTUDY
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-home__footer">
        <div class="w-home__footer__container">
            <div class="w-home__footer__container__message">
                <div class="w-home__footer__container__message-title">
                Have A General Inquiry?
                </div>
                <div class="w-home__footer__container__message-tagline">
                If you have a general inquiry and would like to speak to our expert team, you can contact us via email at: <?php echo $contact_email; ?>
                </div>
                <div class="g-speaktoteambtncontainer" style="margin:10px 0 0 0">
                    <div class="g-speaktoteambtn">
                        <div class="g-speaktoteambtn-text">Speak to our team today</div>
                        <div class="g-speaktoteambtn-subtext">Schedule your FREE audit call now</div>
                    </div>
                </div>
            </div>
            <div class="w-home__footer__container__details">
                <img src="assets/logo.png" class="g-logo" style="margin:18px!important;"/>
                <div class="w-home__footer__container__details-number">
                IAG Online Services - Company Number: <?php echo $company_number; ?>
                </div>
                <div class="w-home__footer__container__details-rightsreserved">
                All Rights Reserved | All Wrongs Reversed
                </div>
                <div class="w-home__footer__container__details-links">
                Terms & Conditions | Privacy Poli cy | Disclaimer
                </div>
            </div>
        </div>
    </div>
</body>
</html>