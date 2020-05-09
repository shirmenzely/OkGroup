<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/login_register.css"/>

<main>
 
   
<section class="title caption" style="background-image: url('<?php echo base_url(); ?>asset/img/login_title.jpg')">
<span class="border"><?php echo $title; ?></span><br>
 </section>
   
   
   
   <p id="error"  class="red"><?php
        if (isset($error)) {
            echo $error['message'];
        }
        ?>
    </p>


    <section id="loginSec"> 
        <?php echo form_open('Login/auth'); ?>
        <label>אימייל </label>
        <input type="email" id="fname" name="user"placeholder="הכנס אימייל" required>

        <label>סיסמה</label>
        <input type="password" id="lname" name="password" placeholder="הכנס סיסמא" required>

        <input  type="submit" class="button" id="submit"  value="התחבר" name="submit">
        <input type="button" id="registerbutton" onclick="document.getElementById('id01').style.display = 'block'" value="הרשמה"> 

        <?php echo form_close(); ?>   

    </section>




    <div id="id01" class="modal">
        <section class="modal-content animate" >
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display = 'none'" class="close" title="Close Modal">&times;</span>
                <h2>רישום לאתר</h2>
            </div>


            <div class="container">
            <p id="error_reg" class="red"></p>
                <?php echo form_open('Login/save'); ?>
                    <label >אימייל</label>  
                    <input  type="email" id="cemail" name="user" placeholder="israel@gmail.com" required>
                    <label >סיסמה </label>
                    <input  type="password" id="cpass" name="password" placeholder="205678926">
                    <label >שם חברה</label>
                    <input  type="text" id="cname" name="company" placeholder="O.K Group" required>
                  
                    <input id="regbutton" type="button" value="הירשם" class="btn" name="submit">
                <?php echo form_close(); ?>   
            </div>
        </section>
    </div>
</main>

<script>
    $(".btn").click(function () {

        var cemail = $("#cemail").val();
        var cpass = $("#cpass").val();
        var company = $("#cname").val();
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url(); ?>" + "/Login/save",
            data: {user: cemail, password: cpass, company: company},
            error: function () {
                alert('Something is wrong');
            },
            success: function (data) {
                if (data === "1") {
                    alert("ההרשמה בוצעה בהצלחה");
                    window.location.href = "<?php echo site_url('Login/login'); ?>";
                }
                else {
                    $("#error_reg").html(data);
                }
            }
        });

    });


// Get the modal
    var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    }
</script>