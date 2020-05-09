<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/pending_order.css"/>

<main>
<section class="title caption" style="background-image: url('<?php echo base_url(); ?>asset/img/bid_title.jpg')">
<span class="border"><?php echo $title; ?></span><br>
 </section>


<section id="select">
<?php echo form_open('Employee_portal/view_order') ?>
 <lable> בחר סטטוס הזמנה: </lable>  
<select name="status">
<option label="כל ההזמנות" value = "כל ההזמנות" >כל ההזמנות</option>
<option label="ללא הצעת מחיר" value = "ללא הצעת מחיר">ללא הצעת מחיר</option>
<option label="נשלחה הצעת מחיר" value = "נשלחה הצעת מחיר">נשלחה הצעת מחיר</option>
<option label="ממתין להצעת מחיר חדשה" value = "ממתין להצעת מחיר חדשה ">ממתין להצעת מחיר חדשה</option>
<option label="מאושר" value = "מאושר ">מאושר</option>
</select>
<input id="but" name="submit" type="submit" value="הצג"> 

</form>
</section>


<?php if ($order != NULL) { ?>
    <table id="order" style="overflow-x:auto;">
            <tr>           
                <th>תאריך אירוע</th>
                <th>סטטוס </th>
                <th>סוג אירוע</th>
                <th>טלפון</th>
                <th>שם חברה</th>
                <th>שם מלא</th>
                <th>מספר הזמנה</th>
                <th>  </th>

            </tr>
    <?php foreach ($order as $new_order) : ?>
            <?php echo form_open('Employee_portal/extra_details') ?>
            <tr>
            <td><?php echo $new_order['order_date'] ?></td>
            <td><?php echo $new_order['status'] ?></td>
            <td><?php echo $new_order['order_type'] ?></td>
            <td><?php echo $new_order['phone_contect'] ?></td>
            <td><?php echo $new_order['company'] ?></td>
            <td><?php echo $new_order['name_contect'] ?></td>
            <td>  <?php echo $new_order['id'] ?> </td>
            <td><a href=" "><input id="but" name="details" type="submit" value="עריכת הצעת מחיר"></a></td>

            </tr>

            <span id="to_hide">
            <input type="text" id="id_input"name="id" value="<?php echo $new_order['id'] ?>">
             </span>
    </form>
    
    <?php endforeach; ?>
    </table>
    <?php }else{ ?>
       <div id="empty"> 
אין הזמנות בסטטוס זה!    </div>

    <?php }?>
</main>