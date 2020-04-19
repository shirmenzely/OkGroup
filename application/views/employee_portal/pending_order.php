<main>

<?php  echo $user['company'] ?> 

<?php echo form_open('Employee_portal/view_order') ?>
<p >   <lable>בחר את הקטגוריה</lable> </p>
<input  name="submit" type="submit" value="הצג"> 
<select name="status">
<option label=" כל ההזמנות" value = "כל ההזמנות" >כל ההזמנות</option>
<option label="ללא הצעת מחיר" value = "ללא הצעת מחיר">ללא הצעת מחיר</option>
<option label="נשלחה הצעת מחיר" value = "נשלחה הצעת מחיר">נשלחה הצעת מחיר</option>
<option label="מאושר" value = "מאושר ">מאושר</option>
<option label="מבוטל" value = "מבוטל">מבוטל</option>
</select>
</form>


<?php if ($order != NULL) : ?>
    <?php foreach ($order as $new_order) : ?>
        <table class="center">
            <tr>
           
                <th>  </th>
                <th>תאריך אירוע</th>
                <th>סטטוס </th>
                <th>סוג אירוע</th>
                <th>טלפון</th>
                <th>שם חברה</th>
                <th>שם מלא</th>
                <th>קוד הזמנה</th>
            </tr>
            <?php echo form_open('Employee_portal/extra_details') ?>
            <td><input id="but" name="details" type="submit" value="עריכת הצעת מחיר"></td>
            <td><?php echo $new_order['order_date'] ?></td>
            <td><?php echo $new_order['status'] ?></td>
            <td><?php echo $new_order['order_type'] ?></td>
            <td><?php echo $new_order['phone_contect'] ?></td>
            <td><?php echo $new_order['company'] ?></td>
            <td><?php echo $new_order['name_contect'] ?></td>
            <td>  <?php echo $new_order['id'] ?> </td>

            <span id="to_hide">
            <input type="text" id="id_input"name="id" value="<?php echo $new_order['id'] ?>">
             </span>

    </form>
        </table>



    <?php endforeach; ?>
<?php endif; ?>
</main>