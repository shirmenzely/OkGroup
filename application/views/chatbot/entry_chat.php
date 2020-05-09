<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/entrychat.css" />


<main>
<section class="title caption" style="background-image: url('<?php echo base_url(); ?>asset/img/chat_title.jpg')">
<span class="border"><?php echo $title; ?></span><br>
 </section>
 <div id="message">
<?php echo $message ?>
</div>


 <section class="tab">
     <b>לקוח יקר ! </b> <br>
     חברתנו מאמינה בתקשורת רציפה 24/7 מול הלקוח. <br>
     לכן, בלחיצת כפתור תוכל לעדכן פרטיים רלוונטים בהזמנה דרך הצ'אט בוט שלנו! <br>
     בעזרת הצ'אט תוכל לעדכן : <br>
  מיקום האירוע <br>
  מספר ההמוזמנים<br>
 סוג הגשת האוכל (בופה, הגשה, ללא הסעדה)<br>
במידה ויש לך שאלות נוספות, תוכל ליצור עמנו קשר  דרך: <br>
<a id="mail" href="mailto:haim.okinc@gmail.com "> haim.okinc@gmail.com </a> <i class="fa fa-fw fa-envelope"> </i>   
</br>

054-5691296 <i class="fa fa-fw fa-phone"> </i>
 
<h3>אנא בחר/י את מספר ההזמנה אותה תרצה/י לעדכן:</h3>
<?php echo form_open('Chatbot/chatbot'); ?>
<select name="orderid" id="orderid">
<?php foreach($orders as $order): ?>
<option value="<?php echo $order['id']?>"><?php echo $order['id']?></option>
<?php endforeach ?>
</select>
<input type="submit" value="בחר">
 <?php echo form_close(); ?> 

 </section>
</main>