<?php
if (isset($POST['username'])) {
    //TODO Daten überprüfen
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" a href="../../css/login.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta charset="UTF-8">
    </head>

    <body>
    <button class="btn-login" onclick="openForm()">Login</button>

    <div class="container form-popup" id="myForm">
        <img src="../../lib/logo.jpg"/>
        <form method="post" action="#">
            <div class="form-input">
                <input type="text" name="text" placeholder="Enter your username"/>
            </div>
            <div class="form-input">
                <input type="password" name="password" placeholder="Enter your password"/>
            </div>
            <input type="submit" type="submit" value="LOGIN" class="btn-login"/>
            <input type="button" value="CLOSE" class="btn-login" onclick="closeForm()"/>
        </form>
    </div>
    </body>

    <script>
        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }
    </script>
</html>