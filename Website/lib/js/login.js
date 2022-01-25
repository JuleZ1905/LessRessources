let btn_back = document.getElementById("btn_back");

btn_back.onclick = function() { backHome() }
    //from login back to homepage
function backHome() {
    location.href = "index.php";
}