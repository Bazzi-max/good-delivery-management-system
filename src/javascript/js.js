//variables

var Sign_in = document.getElementById('Sign-in');
var Sign_up = document.getElementById('Sign-up');
var btn = document.getElementById('btn');
var form = document.getElementById("form-box");
var register_form = document.getElementById("register-form");

var Sign_in1 = document.getElementById('Sign-in1');
var Sign_up1 = document.getElementById('Sign-up1');
var btn1 = document.getElementById('btn1');
var form1 = document.getElementById("form-box1");
var register_form1 = document.getElementById("register-form1");

var password = document.getElementById("password");
var password1 = document.getElementById("password1");
var confirmPassword = document.getElementById("confirmPassword");
var deliverNow = document.getElementById("deliverNow_id");
var deliverLater = document.getElementById("deliverLater");
var path1_1 = document.getElementById("path1-1");
var path1_2 = document.getElementById("path1-2");
var path2_1 = document.getElementById("path2-1");
var path2_2 = document.getElementById("path2-2");
var path2_3 = document.getElementById("path2-3");
var price_calc_span = document.getElementById("price_calc_span");
var calculatePrice = document.getElementById("calculatePrice")
var time = document.getElementById("pick-up-time");
var date = document.getElementById("pick-up-date");
//functions

function register() {
    form.style.height = '850px';
    register_form.style.height = '150%';
    Sign_in.style.top = "5px";
    register_form.style.backgroundPositionY = "5% 50%";
    Sign_in.style.left = '-400px';
    Sign_up.style.left = '50px';
    btn.style.left = '110px';
}
function login() {
    form.style.height = '400px';
    register_form.style.height = '100%';
    register_form.style.backgroundPosition = "5% 40%";
    Sign_in.style.top = "120px";
    Sign_in.style.left = '50px';
    Sign_up.style.left = '450px';
    btn.style.left = '0px';
}
function register1() {
    form1.style.height = '950px';
    register_form1.style.height = '150%';
    Sign_in1.style.top = "5px";
    register_form1.style.backgroundPositionY = "5% 50%";
    Sign_in1.style.left = '-400px';
    Sign_up1.style.left = '50px';
    btn1.style.left = '110px';
}
function login1() {
    form1.style.height = '400px';
    register_form1.style.height = '100%';
    register_form1.style.backgroundPosition = "5% 40%";
    Sign_in1.style.top = "120px";
    Sign_in1.style.left = '50px';
    Sign_up1.style.left = '450px';
    btn1.style.left = '0px';
}

$(document).ready(function () {
    var autocomplete;
    var Pick_up = 'Pick-up';
    var Drop_off = 'Drop-off';
    autocomplete = new google.maps.places.Autocomplete((document.getElementById(Pick_up)), {
        types: ['geocode'],
    })
    autocomplete = new google.maps.places.Autocomplete((document.getElementById(Drop_off)), {
        types: ['geocode'],
    })
});
var typed = new Typed("#logo-span", {
    strings: ["Delivery At", "Fastest Speed"],
    typeSpeed: 100,
    backSpeed: 50,
    loop: true
})
function showPassword() {
    if (password.type === "password") {
        password.type = "text";
    } else {
        password.type = "password";
    }
}
function showPassword1() {
    if (password1.type === "password") {
        password1.type = "text";
    } else {
        password1.type = "password";
    }
}
function deliveryNow() {
    deliverNow.style.border = "3px solid #1377EB";
    deliverLater.style.border = "3px solid rgb(105, 107, 109)";
    path1_1.setAttribute("fill", "#1377EB");
    path1_2.setAttribute("fill", "#1377EB");
    path2_1.setAttribute("fill", "black");
    path2_2.setAttribute("fill", "black");
    path2_3.setAttribute("fill", "black");
    time.style.visibility = "hidden";
    date.style.visibility = "hidden";
}
function deliveryLater() {
    deliverLater.style.border = "3px solid #1377EB";
    deliverNow.style.border = "3px solid rgb(105, 107, 109)";
    path2_1.setAttribute("fill", "#1377EB");
    path2_2.setAttribute("fill", "#1377EB");
    path2_3.setAttribute("fill", "#1377EB");
    path1_1.setAttribute("fill", "black");
    path1_2.setAttribute("fill", "black");
    time.style.visibility = "visible";
    date.style.visibility = "visible";
}
function getPrice() {
    alert("Price is: " + Math.floor(100 + (Math.random() * 100) + 100));
}
function calc_Price() {
    document.getElementById("Payment-Amount").innerHTML = Math.floor(100 + (Math.random() * 100) + (Math.random() * 100));
}

function check() {
    var email = document.getElementById("email-register").value;
    var confirmEmail = document.getElementById("confirmEmail").value;
    if (email != confirmEmail) {
        alert("Email not matched");
        return false;
    }
    if (password1.value != confirmPassword.value) {
        alert("Password not matched");
        return false;
    }
    return true;
}

// let myWindow;

// function openWin() {
//     myWindow = window.open("/DBMSProject/src/OD.php");
// }

// function closeWin() {
//     myWindow.close();
// }
