<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">   
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/headerfooter.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


        <script src="<?php echo base_url(); ?>asset/script/nav.js"> </script>
    </head>
    <body>
        <header>
            <img  id="logoimg" height="10%"  width="10% "src="<?php echo base_url(); ?>asset/img/ok.png" >

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <nav class="topnav" id="myTopnav">
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                </a> 
                <?php 
                if($user != NULL){?> 

                <a href="<?php echo site_url(); ?>/pages/index_2" class="active">דף הבית</a> 
                <?php }
                else { ?>
                <a href="<?php echo site_url(); ?>/pages/index" class="active">דף הבית</a>
                <?php }?>
                <a href="#about">?מי אנחנו</a>
                <a href="#about">גלריית תמונות </a>
                <a href="#about">הזמנת שירות </a>
                <a href="#about" id="contact">מעקב הזמנות  </a>

                <?php
                if ($user != NULL) {
                    echo '<a id="logout" href="' . site_url() . '/Login/logout">התנתקות</a>';
                }
                else { ?>
                <a id="login" href="<?php echo site_url(); ?>/Login/login" >התחברות</a>
                <?php }?>

            </nav>
            <div id="logout"> <?php if ($user!=NULL){echo 'Hello '.$user['user'];} ?></div>

        </header>

        <script> //View pages on the menu by checking if the user is logged in or not
            <?php
            if ($user == NULL) {
                $val = 0;
            }
            ?>
            var user = "<?= $val ?>";
            user = parseInt(user);

            if (user === 0) {
                document.getElementById('contact').style.display = 'none';

            }
            else {
                document.getElementById('contact').style.display = 'inline-block';
            }

        </script>
