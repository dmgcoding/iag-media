
# IAG Media(Clone)

This is the clone of https://iag-media.com/. Built with php. 

Live website of the clone > http://iag-media-test.infinityfreeapp.com/

(go to admin panel- http://iag-media-test.infinityfreeapp.com/web-admin)

### New features

Built a simple admin panel to update stats, company details and employees. Added login/logout and session to preserve admin login.




## Demo


<img src="https://github.com/dmgcoding/iag-media/blob/main/gifs/site.gif" width="500"/>

<img src="https://github.com/dmgcoding/iag-media/blob/main/gifs/details_1.gif" width="500"/>

<img src="https://github.com/dmgcoding/iag-media/blob/main/gifs/members1.gif" width="500"/>

<img src="https://github.com/dmgcoding/iag-media/blob/main/gifs/members2.gif" width="500"/>

<img src="https://github.com/dmgcoding/iag-media/blob/main/gifs/progress.gif" width="500"/>


## Deployment

    1. Clone the repo 
    2. Paste the folder into xampp htdocs folder. 
    3. Go to phpmyadmin and create a new database named 'iag_media'. 
    4. create a table named 'details' with columns(id[int],logoUrl[varchar], contact_email[varchar], company_number[varchar]). add a record.
    5. create a table named 'progress' with columns(id[int], clients_helped[int], total_ad_spent[int] ,number_of_offices[int] ,services_offer[int]).
    6. create a table named 'members' with columns(id[int], name[varchar], role[varchar], imgUrl[varchar])
    7. change admin password and username in 'functions/auth/login.php' > login function as you wish.
    8. Go to your browser and type 'localhost/iag-media/' to see the website.

    (go to 'localhost/iag-media/web-admin' to go to admin panel)



## 🚀 About Me
I'm a full stack developer. I started as mobile app developer(prefer flutter and react-native stacks over native). And then moved to webdevelopment.
I've worked on projects with flutter,react-native,nodejs,express.js,django,php,react,nextjs,wordpress.

### Contact
* email: dmgshehan123@gmail.com
* fb: https://www.facebook.com/dmgcoding

