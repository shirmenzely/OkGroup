<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/order.css"/>


<div id="user_not_connected">
    על מנת לבצע הזמנה עלייך להיות מחובר
    <a id="login" href="<?php echo site_url(); ?>/Login/login" > <button>התחברות/רישום
        </button></a>
</div>



<div id="orderForm">

    <div  id="error">
        <?php
        if (isset($error)) {
            echo $info['message'];
        }
        ?> </div>
    <?php echo form_open('Order/insert'); ?>

    <!-- One "tab" for each step in the form: -->
    <section class="tab">בחר סוג אירוע


        <p>  <fieldset id="no" oninput="this.className = ''">
            <input type="radio"name="order_type" class="order_type" id="1" value="הרצאה"/> <br />
            <input type="radio" name="order_type" class="order_type" id="2" value="כנס " /> <br />
            <input type="radio" name="order_type" class="order_type" id="3" value="אירוע חברה"/><br />
        </fieldset>

        <input type="button" onclick="choose_type1()" name="lecture"  value="הרצאה">
        <input type="button" name="conference"onclick="choose_type2()"  value="כנס">
        <input type="button" name="compeny_event"onclick="choose_type3()"  value="אירוע חברה"> </p>


    </section>

    <section class="tab">פרטי הזמנה:
        <p><span id="error_num_participants" class="error_message"></span>
            כמות מוזמנים: <input onkeyup="check()" oninput="this.className = ''" name= "num_participants" id= "num_participants" type="text"></p>
        <span id="error_city"></span>
        <p> מקום האירוע: <input onkeyup="check()" oninput="this.className = ''" name= "city" id= "city" type="text"></p>
        <span id="error_order_date"></span>
        <p> תאריך האירוע: <input onkeyup="check()" oninput="this.className = ''" placeholder="DD/MM/YYYY" name= "order_date" id= "order_date" type="text"></p>
        <span id="error_name"></span>
        <p> שם איש קשר: <input onkeyup="check()" oninput="this.className = ''" name= "name_contect" id= "name_contect" type="text"></p>
        <span id="error_phone"></span>
        <p> טלפון איש קשר: <input onkeyup="check()" oninput="this.className = ''" name= "phone_contect" id= "phone_contect" type="text"></p>
        <p> הערות: <textarea oninput="this.className = ''" name= "note" id= "note" type="text"> </textarea></p>
    </section>

    <section class="tab">בחרי פרטי ספק אוכל:
        <input type="checkbox"name="no_food" id="no_food" onclick="readonly_food()"> לא מעוניין בספק אוכל

        <p>
            <span id="error_type_dish"class="error_message"></span>

            צורת הגשה:<select onclick="check()"  name="type_dish" id="type_dish">
                <option oninput="this.className = ''" value="בופה">בופה</option>
                <option oninput="this.className = ''"  value="הגשה">הגשה</option>        
            </select>
        </p>

    </section>
    <section class="tab">בחרי פרטי ספק אוכל:
        <?php foreach ($supplier as $new_supplier): ?>

            <input type="checkbox" name="supplierarr[]" value="<?php echo $new_supplier['code_supplier'] ?>"> <?php echo $new_supplier['profession'] ?>

        <?php endforeach; ?>   


        <input type="submit" value="שלח" class="btn" name="submit">
    </section>


    <div style="overflow:auto;">
        <div style="float:right;">
            <button type="button" id="nextBtn" onclick="nextPrev(1)">הבא</button>
            <button type="button" id="prevBtn" onclick="nextPrev(-1)">הקודם</button>  
        </div>
    </div>
    <!-- Circles which indicates the steps of the form: -->
    <div style="text-align:center;margin-top:40px;">
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
    </div>
    <?php echo form_close(); ?>
</div>


<script>
    document.getElementById("no").style.display = "none";
    document.getElementById("nextBtn").style.display = "none";

    //If the user is not connect the orger page dont apper

<?php if ($user != NULL) { ?>
        document.getElementById("user_not_connected").style.display = "none";
        document.getElementById("orderForm").style.display = "inline-block";

        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab
        document.getElementById("no").style.display = "none";
        document.getElementById("nextBtn").style.display = "none";

<?php } else {
    ?>
        document.getElementById("user_not_connected").style.display = "inline-block";
        document.getElementById("orderForm").style.display = "none";


<?php } ?>




</script>    
