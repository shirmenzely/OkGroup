<script src="<?php echo base_url(); ?>asset/js/main.js" defer></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/chatbot.css" />

<main>
    <?php echo form_open('Chatbot/updateOrder'); ?>
    <section id="responseSection">
        <input type="number" name="num_participants" id="num_participants">
        <input type="text" name="city" id="city">
        <input type="text" name="type_dish" id="type_dish">
        <input type="text" name="orderid" id="orderid" value="<?php echo $orderid ?>">
        <div id="usernamediv"> <input type="text" id="usrename" value="<?php echo  $user['company'] ?>"></div>
    </section>
    <section id="chatsec">
        <div class="chat" id="text-output">

        </div>

        <div class="chat">
            <input type="submit" class="blackText hight" id="submit" value="End Chat">
            <input type="button" name="send-message" class="blackText hight" id="send-message" value="Send Message" onclick="watson_sendMessage()" />
            <input type="text" class="hight" id="text-input" name="text-input" value="" onkeydown="notempty()" />

        </div>

    </section>

    <?php echo form_close(); ?>
</main>



<script>
    window.onload = function() {
        watson_createSession();
    };
    document.getElementById("send-message").disabled = true;

    function notempty() {

        document.getElementById("send-message").disabled = false;

    }

    var input = document.getElementById("text-input");
    input.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById("send-message").click();
        }
    });
</script>