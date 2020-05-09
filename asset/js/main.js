var session_id_obj = {};
var message_obj = {};


function watson_createSession() {
    document.getElementById("submit").disabled=true;

   var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 201) {
            session_id_obj = JSON.parse(this.response);
            watson_sendMessage();
        }
    };
    xhttp.open("POST", "http://localhost:3000/watson/createSession", true);
    xhttp.send();
}

function watson_sendMessage(message) {
    var textInputValue = document.getElementById("text-input").value;
    document.getElementById("text-input").value="";

    if (textInputValue === "") {
        message = "";
    } else {
        message = textInputValue;
        addElement("user", textInputValue);
    }
    var body = JSON.stringify({"session": session_id_obj.session_id,"message":message});
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var obj = JSON.parse(this.response);
            addElement("bot",obj.response.output.generic[0].text);
            document.getElementById("num_participants").value = obj.response.context.skills["main skill"].user_defined.number;
            document.getElementById("city").value = obj.response.context.skills["main skill"].user_defined.location;
            document.getElementById("type_dish").value = obj.response.context.skills["main skill"].user_defined.type_dish;
            document.getElementById("submit").disabled = false;
        }
    };
    document.getElementById("send-message").disabled= true;

    xhttp.open("POST", "http://localhost:3000/watson/sendMessage", true);
    xhttp.send(body);

}

function addElement(sender, message) {
   // create a new div element 
   var newDiv = document.createElement("div");
   var img=document.createElement("img");
   newDiv.appendChild(img);
   var text = document.createElement("p");
   text.innerHTML=`${message}`;
   newDiv.appendChild(text);
   var name=document.createElement("span");
   newDiv.appendChild(name);
   var username2= document.getElementById("usrename").value;
   var time=document.createElement("span");
   time.innerHTML=`${new Date().toLocaleString()}`;
   newDiv.appendChild(time);
   if (sender === 'bot') {
       newDiv.classList.add("container");
       newDiv.style.float= "left";
       time.classList.add("time-right");
       img.src="http://localhost/OkGroupSystem/asset/img/ok.png";
   } 
   
   else {
     newDiv.classList.add("darker");
     newDiv.classList.add("container");
     newDiv.style.float= "right";
    //name.innerHTML=username2;
    //name.style.textAlign= "right";
    //name.style.float= "right";

     time.classList.add("time-left");
     img.classList.add("right");
     text.style.textAlign= "right";
     img.src="http://localhost/OkGroupSystem/asset/img/user.png";
   }

   // add the newly created element and its content into the DOM 
   var currentDiv = document.getElementById("text-output");
   currentDiv.appendChild(newDiv);
   currentDiv.scrollTo(0,2000000);

}


