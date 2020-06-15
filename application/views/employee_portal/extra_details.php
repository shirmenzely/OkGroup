<!--link to css and js file-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/extra_details.css" />
<script src="<?php echo base_url(); ?>asset/js/employee_portal.js"> </script>


<main>
    <section id="tab">
        <a href="<?php echo site_url(); ?>/employee_portal/view_order" class="previous round" title="לחזרה לכל ההזמנות"> &#8249;
        </a>
        <a href="<?php echo site_url(); ?>/employee_portal/getCalendar" title="לוח אירועים" >
        <img class="pic menu" src="<?php echo base_url(); ?>asset/img/google-calendar.png">
    </a>
        <h1> מספר הזמנה
            <?php echo $order[0]['id'] ?> </h1>
        <div id="massege">
            <?php //Notify whether the system was successful or not
            if ($this->session->flashdata("message")) {
                echo "
  <p>
   <b> " . $this->session->flashdata("message") . " </b>
  </p>
  ";
            }

            if ($this->session->flashdata("message2")) {
                echo "
  <p>
   <b> " . $this->session->flashdata("message2") . " </b>
  </p>
  ";
            }

            if ($order[0]['change_details'] != null) {
                echo 'לקוח ביקש לעדכן פרטים בהזמנה: <br>';
                echo $order[0]['change_details'];
            }


            $price_for_extra_supplier = 0; //A variable that will save the amount to pay for extra supplier
            ?></div>

        <?php if ($order != NULL) : ?>
            <!--If there is information in the view the information-->
            <p style="text-align: center">
                <label id="statusLable"> <?php echo $order[0]['status'] ?>
                    <a id="status1" onclick="changestatus()"> ערוך סטטוס</a><br></label>

                <div id="selectStatus" style="text-align: center">
                    <?php echo form_open('Employee_portal/change_status') ?>
                    <select name="status_order">
                        <option label="ללא הצעת מחיר" value="ללא הצעת מחיר">ללא הצעת מחיר</option>
                        <option label="נשלחה הצעת מחיר" value="נשלחה הצעת מחיר">נשלחה הצעת מחיר</option>
                        <option label="מאושר" value="מאושר">
                            מאושר</option>
                    </select>
                    <input type="number" id="to_hide" name="order_id" value="<?php echo  $order[0]['id'] ?>"><!-- Element not displayed so we can send the order number to controller-->
                    <input name="submit3" type="submit" value="עדכן סטטוס">
                    <span class="red"><br> *כאשר סטטוס ההצעת מחיר יהיה "מאושר" האירוע יתווסף ליומן האירועים</span>
                    <?php echo form_close() ?>
                </div>
            </p>
            <section id="flex">
                <div class="flexdiv">
                    <h3>פרטי הזמנה </h3>

                    <label><b>סוג אירוע:</b> <?php echo $order[0]['order_type'] ?> </label><br>
                    <label><b> מספר משתתפים:</b> <?php echo $order[0]['num_participants'] ?></label><br>
                    <label><b> מיקום אירוע: </b><?php echo $order[0]['city'] ?> </label><br>
                    <label><b> תאריך האירוע: </b><?php echo $order[0]['order_date'] ?> </label><br>
                    <label><b> סוג הגשה:</b> <?php echo $order[0]['type_dish'] ?> </label><br>
                    <?php if ($order[0]['note'] != " ") : ?><label> <b> הערות לקוח:</b>
                            <?php echo $order[0]['note'] ?></label><br>
                    <?php endif ?>
                    <?php if ($supplier != NULL) : ?>
                        <b> <?php echo $title2 ?>: </b> <br>
                        <?php foreach ($supplier as $new_supplier) : ?>
                            <label> <?php echo $new_supplier['profession'] ?> <label><br>
                                    <!--Display the supplier -->
                                    <?php $price_for_extra_supplier = $price_for_extra_supplier + ((int) $new_supplier['cost']); //Calculate supplier cost  
                                    ?>
                                <?php endforeach ?>
                            <?php endif ?>
                        <?php endif ?>

                </div>

                <div class="flexdiv">
                    <h3>פרטי מזמין </h3>
                    <label><b>שם איש קשר:</b> <?php echo  $order[0]['name_contect'] ?> </label><br>
                    <label><b>טלפון: </b><?php echo  $order[0]['phone_contect'] ?> </label><br>
                    <label><b>אימייל:</b> <?php echo  $order[0]['email'] ?> </label><br>
                    <label><b> שם חברה: </b><?php echo  $order[0]['company'] ?> </label><br>
                </div>
            </section>
            <!--View the quote in PDF and send it by email -->
            <?php echo form_open('Employee_portal/bid_pdf') ?>
            <section id="to_hide">
                <!--This section does not appear to the customer -->
                <?php foreach ($price as $new_price) :
                    if ($new_price['type'] == $order[0]['type_dish']) : ?>
                        <input type="number" id="price_person" value="<?php echo $new_price['cost'] ?>">
                        <input type="number" id="price_for_extra_supplier" value="<?php echo $price_for_extra_supplier ?>">
                    <?php endif ?>
                <?php endforeach ?>

                <input type="number" id="order_id" name="order_id" value="<?php echo $order[0]['id'] ?>">
                <input type="email" id="email_user" name="email_user" value="<?php echo $order[0]['email'] ?>">
                <input type="number" id="show" name="show" value="1">
                <input type="text" id="status" value="<?php echo $order[0]['status'] ?>">
                <input type="text" id="price" value="<?php echo $order[0]['final_price'] ?>">
                <input type="number" id="num_participants" value="<?php echo $order[0]['num_participants'] ?>">
                <?php $price = $order[0]['final_price'] ?>
            </section>

            <section id="bid">
                <h2>הצעת מחיר</h2>
                <a id="titleprice">הצעת מחיר על פי המערכת: </a>
                <a id="system_price"></a>
                <br>הכנס הצעת מחיר:
                <input type="number" id="final_price" name="final_price" value="<?php echo $price ?>" >
                <input type="submit" id="send" onclick="document.getElementById('show').value = 0">
                <input id="show_pdf" type="submit" value=" צפייה בהצעת מחיר ושמירה" onclick="document.getElementById('show').value = 1;">
                <span class="red"><br>* המחיר המופיע בתיבה הוא המחיר האחרון שנשמר במערכת</span>
            </section>
            <?php echo form_close() ?>

    </section>
    </section>
</main>

<script>
      window.onload = function() {
        get_final_price();
    };
    document.getElementById("selectStatus").style.display = "none";
    document.getElementById("to_hide").style.display = "none";
    var status = document.getElementById("status").value;
    show_status();
</script>