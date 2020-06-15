<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/headerfooter.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/js/nav.js"></script>
    <link rel="icon" type="image/gif/png" href="<?php echo base_url(); ?>asset/img/ok.png">
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@300&display=swap" rel="stylesheet">
    <title><?php echo $title ?></title>
</head>

<body>
    <header>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <nav class="topnav" id="myTopnav">
            <img id="logoimg" src="<?php echo base_url(); ?>asset/img/ok1.png">

            <div id="shoerow"><br> </div>

            <a href="javascript:void(0);" class="icon" onclick="myFunction()">

                <i class="fa fa-bars"></i> </a>


            <a href="<?php echo site_url(); ?>/pages/index" class="active"><i id="iconav" class="fa fa-fw fa-home"> </i> דף הבית
            </a>
            <a href="<?php echo site_url(); ?>/profile/profile" id="profile">פרופיל אישי  </a>

            <a href="<?php echo site_url(); ?>/pages/photo_galary">גלריית תמונות </a>

            <a href="<?php echo site_url(); ?>/order/index" >הזמנת שירות </a>

            <a href="<?php echo site_url(); ?>/chatbot/selectOrderpage" id="chat">עדכון פרטי הזמנה </a>

            <?php
            if ($user['manager'] == 1) { ?>
                <a href="<?php echo site_url(); ?>/employee_portal/portal" id="contact">פורטל עובדים </a>
                <?php  } ?>
            <?php
            if ($user != NULL) {
                echo '<a id="logout" href="' . site_url() . '/Login/logout">התנתקות</a>';
            } 
            
            else {
            ?>
                <a id="login" href="<?php echo site_url(); ?>/Login/login"><i id="iconav" class="fa fa-fw fa-user"> </i> התחברות / הרשמה
                    </a>
            <?php } ?>
        </nav>



    </header>


    <script>
        //View pages on the menu by checking if the user is logged in or not
        <?php
        if ($user == NULL) {
            $val = 0;
        }
        ?>
        var user = "<?= $val ?>";
        user = parseInt(user);

        if (user === 0) {
            document.getElementById('chat').style.display = 'none';
            document.getElementById('profile').style.display = 'none';


        } else {
            document.getElementById('chat').style.display = 'inline-block';
            document.getElementById('profile').style.display = 'inline-block';

        }
    </script>