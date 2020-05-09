<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/portal.css"/>

<main>
<section class="title caption" style="background-image: url('<?php echo base_url(); ?>asset/img/porta_title.jpg')">
<span class="border"><?php echo $title; ?></span><br>
 </section>
 <section class="tab">
<h3 style=" text-align: center;"> 
   ברוכ/ה הבא/ה! <span id="name"> <?php  echo $user['company'] ?>  </span> 
   המשך פעילות מהנה במערכת של
<img width="50px"  src="<?php echo base_url(); ?>asset/img/ok.png" > 
</h3>

<h4> אנא בחר/י את הפעולה אותה תרצה/י לעשות</h4>
<a href="<?php echo site_url(); ?>/employee_portal/view_order"><div class="button">ניהול הצעות מחיר 
</div></a>
<a href="<?php echo site_url(); ?>/employee_portal/getCalendar"><div class="button">יומן אירועים
</div></a>
 </section>
</main>


