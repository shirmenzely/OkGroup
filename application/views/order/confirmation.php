<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/confirmation.css"/>

<main>
<div id="message">
<?php
if($user['manager']==1){?>
שים לב ההזמנה בוצע על ידי משתמש מסוג מנהל
<?php } ?> </div>

<section id="tab">

<h1> הזמנתך התקבלה בהצלחה !</h1>

מספר ההזמנה שלך הוא: 
<b>
<?php echo  $id[0]['max(id)'];
?></b>
<br>
אנו עובדים כעת על הצעת המחיר שלך, <br>
ובימים הקרובים תקבל אותה למייל.  <br>
במידה ותרצה לערוך שינוי בהזמנה תוכל לעשות זאת דרך המערכת בצ'אט אונליין 24/7 תחת לשונית "עדכון פרטי הזמנה"
<h2>
תודה שבחרת    <img id="firstimg" src="<?php echo base_url(); ?>asset/img/ok.png" >     ניפגש בקרוב ! 

</h2>

</section>


     
</main>   
     
