<script src="<?php echo base_url(); ?>asset/script/new_order.js"> </script>
<main>


<?php
if($user['manager']==1){?>
שים לב ההזמנה בוצע על ידי משתמש מסוג מנהל
<?php } ?>

<?php

echo 'ההזמנה בוצעה בהצלחה! <br>
בימים הקרובים תקבל למייל הצעת מחיר <br>
מספר ההזמנה הוא:';
echo  $id[0]['max(id)'];
?>
     
</main>   
     
     