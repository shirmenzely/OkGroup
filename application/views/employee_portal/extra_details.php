<!--link to css and js file-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/extra_details.css" />
<script src="<?php echo base_url(); ?>asset/script/employee_portal.js"> </script>


<main>
    <?php //Notify whether the system was successful or not
    if ($this->session->flashdata("message")) {
        echo "
  <p>
   <b> " . $this->session->flashdata("message") . " </b>
  </p>
  ";
    }
    $price_for_extra_supplier = 0; //A variable that will save the amount to pay for extra supplier
    ?>
    <?php if ($order != NULL) : ?>
        <!--If there is information in the view the information-->
        <?php foreach ($order as $new_order) : ?>
            <label>מספר הזמנה: <?php echo $new_order['id'] ?> <label><br>
            <label>סוג אירוע: <?php echo $new_order['order_type'] ?> <label><br>
            <label>שם איש קשר: <?php echo $new_order['name_contect'] ?> </label><br>
            <label>טלפון: <?php echo $new_order['phone_contect'] ?> </label><br>
            <label>אימייל: <?php echo $new_order['email'] ?> </label><br>
            <label> שם חברה:<?php echo $new_order['company'] ?> </label><br>
            <label> מספר משתתפים: <?php echo $new_order['num_participants'] ?></label><br>
            <label> מיקום אירוע: <?php echo $new_order['city'] ?> </label><br>
            <label> תאריך האירוע: <?php echo $new_order['order_date'] ?> </label><br>
            <label> סוג הגשה: <?php echo $new_order['type_dish'] ?> </label><br>
            <?php if ($new_order['note'] != " ") : ?> הערות לקוח:
                    <label> <?php echo $new_order['note'] ?></label>
            <?php endif ?>
            <?php if ($supplier != NULL) : ?>
                <h2><?php echo $title2 ?></h2>
                <?php foreach ($supplier as $new_supplier) : ?>
                    <label> <?php echo $new_supplier['profession'] ?> <label><br><!--Display the supplier -->
                    <?php $price_for_extra_supplier = $price_for_extra_supplier + ((int) $new_supplier['cost']); //Calculate supplier cost  ?>
                    <?php endforeach ?>
            <?php endif ?>
        <?php endforeach ?>
    <?php endif ?>

    <p>
     <h3>סטטוס הצעת מחיר</h3>
     <label id="statusLable"> <?php echo $new_order['status'] ?>
     <input type="button" value="ערוך סטטוס" onclick="changestatus()"> <br></label>

    <div id="selectStatus">
    <?php echo form_open('Employee_portal/change_status') ?>
    <input type="number" id="to_hide" name="order_id" value="<?php echo $new_order['id'] ?>"><!-- Element not displayed so we can send the order number to controller-->
    <select name="status_order">
        <option label="ללא הצעת מחיר" value="ללא הצעת מחיר">ללא הצעת מחיר</option>
        <option label="נשלחה הצעת מחיר" value="נשלחה הצעת מחיר">נשלחה הצעת מחיר</option>
        <option label="מאושר" value="מאושר ">מאושר</option>
        <option label="מבוטל" value="מבוטל">מבוטל</option>
    </select>
    <input name="submit" type="submit" value="עדכן סטטוס">
      <?php echo form_close() ?>
     </div>
     </p>

 <!--View the quote in PDF and send it by email -->
<?php echo form_open('Employee_portal/bid_pdf') ?>
     <section id="to_hide"><!--This section does not appear to the customer -->
     <?php foreach ($price as $new_price) :
        if ($new_price['type'] == $new_order['type_dish']) : ?>
            <input type="number" id="price_person" value="<?php echo $new_price['cost'] ?>">
            <input type="number" id="price_for_extra_supplier" value="<?php echo $price_for_extra_supplier ?>">
        <?php endif ?>
    <?php endforeach ?>

    <input type="number" id="order_id" name="order_id" value="<?php echo $new_order['id'] ?>">
    <input type="email" id="email_user" name="email_user" value="<?php echo $new_order['email'] ?>">
    <input type="number" id="show" name="show" value="1">
    <input type="text" id="status" value="<?php echo $new_order['status'] ?>">
    <input type="text" id="price" value="<?php echo $new_order['final_price'] ?>">
    <input type="number" id="num_participants" value="<?php echo $new_order['num_participants'] ?>">
    <?php $price = $new_order['final_price'] ?>
    </section>

    <span id="final_price_span">
    <a id="titleprice"> </a>
    <a id="system_price"></a>
     <br>הכנס הצעת מחיר:
     <input type="number" id="final_price" name="final_price" value="<?php echo $price ?>">
     <input type="submit" id="send" onclick="document.getElementById('show').value = 0"> <input type="submit" value=" צפייה בהצעת מחיר ושמירה" onclick="document.getElementById('show').value = 1;">
     </span>
    <?php echo form_close() ?>
</main>

<script>
    document.getElementById("selectStatus").style.display = "none";
    document.getElementById("to_hide").style.display = "none";
    var status = document.getElementById("status").value;
    show_status();
    get_final_price();
</script>