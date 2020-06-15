function show_status() {
    if (status == "ללא הצעת מחיר") {
    document.getElementById("send").value = "שלח הצעת מחיר ללקוח";

    get_final_price();
} else {
    document.getElementById("send").value = "שלח הצעת מחיר חדשה";
}
}

function changestatus() {
    document.getElementById("selectStatus").style.display = "block";
    document.getElementById("statusLable").style.display = "none";
}


function get_final_price() {
    price_person = document.getElementById("price_person").value;
    price_for_extra_supplier = document.getElementById("price_for_extra_supplier").value;
    num_participants = document.getElementById("num_participants").value;
    price_for_extra_supplier = parseInt(price_for_extra_supplier);
    var final_price = price_person * num_participants + price_for_extra_supplier;
    document.getElementById("system_price").innerHTML = final_price + ' ש"ח';
}

