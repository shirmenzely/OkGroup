
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/album.css"/>
    <div style="text-align:center" id="headPage">
    <section class="title caption" style="background-image: url('<?php echo base_url(); ?>asset/img/k1.jpg')">
<span class="border"><?php echo $title; ?></span><br>
 </section>    </div>
 <a href="<?php echo site_url(); ?>/pages/photo_galary" class="previous round"title="לחזרה לגלריה">  &#8249; </a>

<div class="row" >
    
    <div class="column">
        <a href="#bigpic"> <img src="<?php echo base_url(); ?>asset/img/k1.jpg" alt="O.K. GROUP" style="width:100%" onclick="presentBigPicture(this);">   </a>
    </div>
    <div class="column">
         <a href="#bigpic"> <img src="<?php echo base_url(); ?>asset/img/k2.jpg"alt="O.K. GROUP" style="width:100%" onclick="presentBigPicture(this);">  </a>
    </div>
    <div class="column">
        <a href="#bigpic">  <img src="<?php echo base_url(); ?>asset/img/k3.jpg" alt="O.K. GROUP" style="width:100%" onclick="presentBigPicture(this);">  </a>
    </div>
    <div class="column">
       <a href="#bigpic">  <img src="<?php echo base_url(); ?>asset/img/k4.jpg" alt="O.K. GROUP" style="width:100%" onclick="presentBigPicture(this);">  </a>
    </div>

    <div class="column">
      <a href="#bigpic">   <img src="<?php echo base_url(); ?>asset/img/k5.jpg" alt="O.K. GROUP" style="width:100%" onclick="presentBigPicture(this);"> </a>
    </div>
    <div class="column">
        <a href="#bigpic">  <img src="<?php echo base_url(); ?>asset/img/k6.jpg" alt="O.K. GROUP" style="width:100%" onclick="presentBigPicture(this);"> </a>
    </div>
    <div class="column">
       <a href="#bigpic">  <img src="<?php echo base_url(); ?>asset/img/k7.jpg" alt="O.K. GROUP" style="width:100%" onclick="presentBigPicture(this);"> </a>
    </div>
    <div class="column">
     <a href="#bigpic">    <img src="<?php echo base_url(); ?>asset/img/k8.jpg" alt="O.K. GROUP" style="width:100%" onclick="presentBigPicture(this);"> </a>
    </div>

    <div class="column">
       <a href="#bigpic">  <img src="<?php echo base_url(); ?>asset/img/k9.jpg" alt="O.K. GROUP" style="width:100%" onclick="presentBigPicture(this);"> </a>
    </div>
    <div class="column">
     <a href="#bigpic">    <img src="<?php echo base_url(); ?>asset/img/k10.jpg" alt="O.K. GROUP" style="width:100%" onclick="presentBigPicture(this);"> </a>
    </div>
    <div class="column">
      <a href="#bigpic">   <img src="<?php echo base_url(); ?>asset/img/k11.jpg" alt="O.K. GROUP" style="width:100%" onclick="presentBigPicture(this);"> </a>
    </div>
    <div class="column">
      <a href="#bigpic">   <img src="<?php echo base_url(); ?>asset/img/k12.jpg" alt="O.K. GROUP" style="width:100%" onclick="presentBigPicture(this);"> </a>
    </div>

</div>


<div class="container" id="bigpic">
    <a href="#headPage" <span onclick="this.parentElement.style.display = 'none'" class="closebtn">&times;</span> </a>
    <img id="expandedImg" style="width:100%">
    <div id="imgtext"></div>
</div>




<script>
    function presentBigPicture(imgs) {
        var expandImg = document.getElementById("expandedImg");
        var imgText = document.getElementById("imgtext");
        expandImg.src = imgs.src;
        imgText.innerHTML = imgs.alt;
        expandImg.parentElement.style.display = "block";
    }
</script>

