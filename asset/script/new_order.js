
function choose_type1() {
    document.getElementById("1").checked = true;
    nextPrev(1);

}
function choose_type2() {
    document.getElementById("2").checked = true;
    nextPrev(1);

}
function choose_type3() {

    document.getElementById("3").checked = true;
    nextPrev(1);

}
function readonly_food() {
    if (document.getElementById("no_food").checked === true) {

        document.getElementById("type_dish").disabled = true;
        document.getElementById("type_dish").value = "ללא";
        document.getElementById('type_dish').classList.remove("invalid");
        document.getElementById('error_type_dish').innerHTML = "";

    }
    else {
        document.getElementById("type_dish").disabled = false;
        document.getElementById("type_dish").value = "בופה";
    }

}



var check = function () {
    console.log('check')
    var num_participants = document.getElementById("num_participants").value;
    var city = document.getElementById("city").value;
    var order_date = document.getElementById("order_date").value;
    var name_contect = document.getElementById("name_contect").value;
    var phone_contect = document.getElementById("phone_contect").value;




    if (/^[1-9][0-9]*$/.test(num_participants) || num_participants === "") {
        document.getElementById('num_participants').classList.remove("invalid");
        document.getElementById('error_num_participants').innerHTML = "";
    } else {
        document.getElementById('error_num_participants').style.color = 'red';
        document.getElementById('error_num_participants').innerHTML = "מספר משתתפים חייב להיות חיובי";
        document.getElementById('num_participants').className += " invalid";
    }

    if (/^05[0-9]{8}$/.test(phone_contect) || phone_contect === "")
    {
        document.getElementById('phone_contect').classList.remove("invalid");
        document.getElementById('error_phone').innerHTML = "";
    }
    else {
        document.getElementById('error_phone').style.color = 'red';
        document.getElementById('error_phone').innerHTML = "אנא הזן מספר נייד תקין";
        document.getElementById('phone_contect').className += " invalid";
    }

    if (/^[a-zA-Z\u0590-\u05fe\s]*$/.test(city) || city === "")
    {
        document.getElementById('city').classList.remove("invalid");
        document.getElementById('error_city').innerHTML = "";

    }
    else {
        document.getElementById('error_city').style.color = 'red';
        document.getElementById('error_city').innerHTML = "מקום האירוע חייב להכיל אותיות בלבד   ";
        document.getElementById('city').className += " invalid";
    }
    var now = new Date();
    //seperate the year,month and day for the first date
    var stryear1 = order_date.substring(6);
    var strmth1 = order_date.substring(3, 5);
    var strday1 = order_date.substring(0, 2);
    var user_date = new Date(stryear1, strmth1 - 2, strday1);

    if (/^(0[1-9]|[12][0-9]|3[01])[- /](0[1-9]|1[012])[- /](19|20)\d\d$/.test(order_date) || order_date === "")
    {
        if (user_date >= now || order_date === "")
        {
            document.getElementById('order_date').classList.remove("invalid");
            document.getElementById('error_order_date').innerHTML = "";

        }
        else
        {
            document.getElementById('error_order_date').style.color = 'red';
            document.getElementById('error_order_date').innerHTML = "הזמנות התקבלו עד 30 ימים לאירוע";
            document.getElementById('order_date').className += " invalid";

        }


    }
    else {
        document.getElementById('error_order_date').style.color = 'red';
        document.getElementById('error_order_date').innerHTML = "תאריך האירוע הוא מסוג DD/MM/YYYY ומכיל מספרים בלבד  ";
        document.getElementById('order_date').className += " invalid";
    }


    if (/^[a-zA-Z\u0590-\u05fe\s]*$/.test(name_contect) || name_contect === "")
    {
        document.getElementById('name_contect').classList.remove("invalid");
        document.getElementById('error_name').innerHTML = "";

    }
    else {
        document.getElementById('error_name').style.color = 'red';
        document.getElementById('error_name').innerHTML = " שם איש הקשר חייב להכיל אותיות בלבד ";
        document.getElementById('name_contect').className += " invalid";
    }


}





function showTab(n) {
    // This function will display the specified tab of the form...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    //... and fix the Previous/Next buttons:
    if (n === 0) {
        document.getElementById("nextBtn").style.display = "none";
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
        document.getElementById("nextBtn").style.display = "inline";
    }
    if (n === (x.length - 1)) {
        document.getElementById("nextBtn").style.display = "none";

    } else {
        document.getElementById("nextBtn").style.display = "inline";
        document.getElementById("nextBtn").innerHTML = "הבא";
    }
    //... and run a function that will display the correct step indicator:
    fixStepIndicator(n)
}

function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    if (n === 1 && !validateForm())
        return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form...
    if (currentTab >= x.length) {
        // ... the form gets submitted:
        document.getElementById("orderForm").submit();
        return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
}

function validateForm() {
    // This function deals with validation of the form fields
    var x, y, i, z, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value === "" || y[i].classList.contains("invalid")) {
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            // and set the current valid status to false
            valid = false;
        }
    }
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; // return the valid status
}

function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class on the current step:
    x[n].className += " active";
}