<p id="error"><?php
    if (isset($error)) {
        echo $error['message'];
    }
    ?> </p>

<?php echo form_open('Login/save'); ?>
<div class="col-50">
    <h2><?php echo $title; ?></h2>
    <label >אימייל</label>  
    <input type="email" id="cemail" name="user" placeholder="israel@gmail.com" required>
    <label >סיסמה </label>
    <input type="password" id="cpass" name="password" placeholder="205678926">
    <label >שם חברה</label>
    <input type="text" id="cname" name="company" placeholder="ישראל ישראל" required>

</div>         
<input id="reg" type="button" value="הירשם" class="btn" name="submit">
<?php echo form_close(); ?>   


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
                        $("#error").html(data);
                    }
                }
            });
        
    });
</script>