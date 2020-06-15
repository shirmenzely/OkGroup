<script src="<?php echo base_url(); ?>asset/js/order.js"> </script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/order.css"/>


<main>

<section class="title caption" style="background-image: url('<?php echo base_url(); ?>asset/img/order_title.jpg')">
<span class="border">הזמנת שירות</span><br>
 </section>
<div id="user_not_connected">
    על מנת לבצע הזמנה עלייך להיות מחובר
    <a href="<?php echo site_url(); ?>/Login/login" > <input type="button" id="login_btn" value="התחברות/רישום"> 
      </a>
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
    <section class="tab ">
        <h3> בחר את סוג השירות אותו תרצה להזמין </h3>
        <br>
        <p>  <fieldset id="no" oninput="this.className = ''">
            <input type="radio"name="order_type" class="order_type" id="1" value="הרצאה"/> <br />
            <input type="radio" name="order_type" class="order_type" id="2" value="כנס " /> <br />
            <input type="radio" name="order_type" class="order_type" id="3" value="אירוע חברה"/><br />
        </fieldset>
        <div class="flex-box" >
       <a  href="#"> <img src="<?php echo base_url(); ?>asset/img/lecture.png" height="150" size="170" onclick="choose_type1()" name="lecture"> </a>
       <a href="#"><img src="<?php echo base_url(); ?>asset/img/conference.png" height="150" size="170" onclick="choose_type2()" name="lecture"> </a>
       <a href="#"><img src="<?php echo base_url(); ?>asset/img/event.png" height="150" size="170" onclick="choose_type3()" name="lecture"> </a>
    </div>
    </section>

    <section class="tab">
    <h1> פרטי ההזמנה</h1>

    <div class="red">* שדות חובה</div>
        <p>
            כמות מוזמנים:  <span class="red">* </span> <span id="error_num_participants" class="error_message" >  </span>
            <input onkeyup="check()" oninput="this.className = ''" name= "num_participants" id= "num_participants" placeholder="300" type="text"></p>
        
        <p>   מקום האירוע (עיר): <span class="red">* </span><span id="error_city"></span> <input onkeyup="check()"placeholder="הרצליה" oninput="this.className = ''" name= "city" id= "city" type="text"></p>
        <p> תאריך האירוע: <span class="red">* </span> <span id="error_order_date"></span><input onkeyup="check()" oninput="this.className = ''" placeholder="DD/MM/YYYY" name= "order_date" id= "order_date" type="text"></p>
        
        <p> שם איש קשר: <span class="red">* </span><span id="error_name"></span> <input onkeyup="check()" placeholder="ישראל ישראלי" oninput="this.className = ''" name= "name_contect" id= "name_contect" type="text"></p>
        
        <p> טלפון איש קשר: <span class="red">* </span><span id="error_phone"></span> <input onkeyup="check()" placeholder="0543876108" oninput="this.className = ''" name= "phone_contect" id= "phone_contect" type="text"></p>
        <p> הערות:<br> <textarea cols="100%" rows="5" oninput="this.className = ''" name= "note" id= "note" type="text" maxlength=250> </textarea></p>
    </section>

    <section class="tab">
        <h1> שירותי מזון</h1>
  
        <p id="type_dish_p">
            צורת הגשה: <select onclick="check()"  name="type_dish" id="type_dish">
                <option oninput="this.className = ''" value="בופה">בופה</option>
                <option oninput="this.className = ''"  value="הגשה">הגשה</option>   
                <option oninput="this.className = ''"  value="ללא הסעדה">ללא הסעדה</option>       
            </select>
        </p>
  

    </section>
    <section class="tab">  
        <h1>  בידור לאירוע</h1>
        <p class="red"> * במידה ואת/ה לא מעוניינ/ת לחצ/י "שלח" מבלי לסמן סוג ספק </p>
        <?php foreach ($supplier as $new_supplier): ?>

            <input type="checkbox" name="supplierarr[]" value="<?php echo $new_supplier['code_supplier'] ?>"> <?php echo $new_supplier['profession'] ?>
<br>
        <?php endforeach; ?>   
<br>

    </section>


    <div id="divbutton"style="overflow:auto;">
        <input type="submit" value="שלח" class="btn" id="btn" name="submit">

            <button type="button" id="nextBtn" onclick="nextPrev(1)">הבא</button>
            <button type="button" id="prevBtn" onclick="nextPrev(-1)">הקודם</button>  
    </div>
    <!-- Circles which indicates the steps of the form: -->
    <div style="text-align:center;margin-top:1%; ;">
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
    </div>
    <?php echo form_close(); ?>
</div>
</main>

<script>
    document.getElementById("no").style.display = "none";
    document.getElementById("btn").style.display = "none";


        //If the user is not connect the orger page dont apper

        <?php if ($user != NULL) { ?>
        document.getElementById("user_not_connected").style.display = "none";
        document.getElementById("orderForm").style.display = "inline-block";

        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab
        document.getElementById("nextBtn").style.display = "none";


<?php } else {
    ?>
        document.getElementById("user_not_connected").style.display = "inline-block";
        document.getElementById("orderForm").style.display = "none";


<?php } ?>  
    




</script>