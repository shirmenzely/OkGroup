<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/photo_galary.css"/>
<main>
<section class="title caption" style="background-image: url('<?php echo base_url(); ?>asset/img/gallery_title.jpg')">
<span class="border"><?php echo $title; ?></span><br>
 </section>

<!-- Photo Grid -->
<section class="row">

        <div class="column">
            <figure>
                <a href="<?php echo site_url(); ?>/pages/album_yavne" class="active"> <img class="gallaryPic" src="<?php echo base_url(); ?>asset/img/y1.jpg" alt="O.K. GROUP" >   </a>    
                <figcaption><h2 style=" text-align: center;"> אירוע עיריית יבנה</h2></figcaption>
            </figure>      
        </div>
        <div class="column">
            <figure>
                <a href="<?php echo site_url(); ?>/pages/album_kulano" class="active">  <img class="gallaryPic" src="<?php echo base_url(); ?>asset/img/k1.jpg"alt="O.K. GROUP"  >   </a>    
                <figcaption> <h2 style=" text-align: center;">כנס  מפלגת כולנו</h2></figcaption>
            </figure>    
        </div>

        <div class="column">
            <figure>
                <a href="<?php echo site_url(); ?>/pages/album_madanes" class="active">   <img class="gallaryPic" src="<?php echo base_url(); ?>asset/img/m1.jpg" alt="O.K. GROUP"  >   </a>    
                <figcaption> <h2 style=" text-align: center;">יום כיף חברת מדנס</h2></figcaption>      
            </figure>
        </div>
        <div class="column">
            <figure>
                <a href="<?php echo site_url(); ?>/pages/album_spaciel_event" class="active">  <img class="gallaryPic" src="<?php echo base_url(); ?>asset/img/s1.jpg" alt="O.K. GROUP" >   </a>    
                <figcaption> <h2 style=" text-align: center;">אירוע מיוחד</h2></figcaption>
            </figure>    
        </div>

</section>
</main>


