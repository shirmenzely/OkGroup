<script src="<?php echo base_url(); ?>asset/js/main.js" defer></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/chatbot.css" />
<section class="title caption" style="background-image: url('<?php echo base_url(); ?>asset/img/chat_title.jpg')">
    <span class="border"><?php echo $title; ?></span><br>
</section>
<main>
    <span id="spanm"><b>שימו לב! הצאט עובד בשפה האנגלית בלבד</b><br>
        **ערים יש לכתוב באות גדולה בתחילת המילה**</span>


    <?php echo form_open('Chatbot/updateOrder'); ?>
    <section id="responseSection">
        <input type="text" name="num_participants" id="num_participants">
        <input type="text" name="city" id="city">
        <input type="text" name="type_dish" id="type_dish">
        <input type="text" name="orderid" id="orderid" value="<?php echo $orderid ?>">
        <div id="usernamediv"> <input type="text" id="usrename" value="<?php echo  $user['company'] ?>"></div>
    </section>
    <section id="chatsec">
        <div class="chat" id="text-output">

        </div>

        <div class="chat">
            <input type="submit" class="blackText hight" id="submit" value="End Chat" title="End Chat">
            <input type="button" name="send-message" class="blackText hight" id="send-message" value="Send" onclick="watson_sendMessage()" title="send message" />
            <input type="text" class="hight" id="text-input" name="text-input" value="" onkeydown="notempty()" />
        </div>

    </section>

    <?php echo form_close(); ?>
    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>
לקוח יקר ! זכור ללחוץ על  כפתור 
"End Chat"
בסיום , על מנת לעדכן את פרטי ההזמנה במערכת             </p>
        </div>

    </div>
</main>

<script>

    window.onload = function() {
        watson_createSession();
    };


    document.getElementById("send-message").disabled = true;
    setTimeout(function() {
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        modal.style.display = "block";


        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    }, 10000);


    function notempty() {
        document.getElementById("send-message").disabled = false;
        document.getElementById("submit").disabled = true;
    }

    var input = document.getElementById("text-input");
    input.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            if (document.getElementById("text-input").value != "")
                document.getElementById("send-message").click();
        }
    });
</script>