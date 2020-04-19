<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">   
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/headerfooter.css"/>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


        <script src="<?php echo base_url(); ?>asset/script/nav.js"></script>
    </head>
    <body>
        <header>

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <nav class="topnav" id="myTopnav">
               

                 <div id="shoerow"><br> </div>  

                <a href="javascript:void(0);" class="icon" onclick="myFunction()"> 
                    
                 <i class="fa fa-bars"></i>    </a> 
                 

                <a href="<?php echo site_url(); ?>/pages/index" class="active">דף הבית
                 <i class="fa fa-fw fa-home"></i></a> 

                <a href="<?php echo site_url(); ?>/pages/who_we_are"  >?מי אנחנו</a>

                <a href="<?php echo site_url(); ?>/pages/photo_galary" >גלריית תמונות </a>

                <a href="<?php echo site_url(); ?>/order/index" class="active">הזמנת שירות </a>

                <?php
                if ($user['manager'] == 1) {?>
                <a href="<?php echo site_url(); ?>/employee_portal/view_order" id="contact" >ניהול הצעות מחיר  </a>
              <?php  }?>
                
                <?php
                if ($user != NULL) {
                    echo '<a id="logout" href="' . site_url() . '/Login/logout">התנתקות</a>';
                } else {
                    ?>
                    <a id="login" href="<?php echo site_url(); ?>/Login/login"> התחברות / הרשמה
                    <i class="fa fa-fw fa-user"></i> </a>
                <?php } ?>
            </nav>

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
