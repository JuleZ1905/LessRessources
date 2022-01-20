let btn_back = document.getElementById("btn_back");
let passw = document.getElementsByClassName("password")[0];
let buttons = document.getElementsByClassName("buttons");

btn_back.onclick = function() { backHome() }

function backHome() {
    console.log("Hallo 1");
    location.href = "index.php";
}