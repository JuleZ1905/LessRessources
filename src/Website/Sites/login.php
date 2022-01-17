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

    <div class="container form-popup" id="myForm">
        <img src="../Bild/neu Logo.png" />
        <form method="POST">
            <div class="form-input">
                <input type="text" name="name" placeholder="Enter your username" />
            </div>
            <div class="form-input">
                <input type="password" name="password" placeholder="Enter your password" />
            </div>
            <input type="submit" name="LOGIN" class="btn-login" />
        </form>
    </div>

    <?php

    if (isset($_POST['LOGIN'])) {
        echo $_POST['name'] . "<br>";
        echo $_POST['password'];
    }

    ?>


</body>

</html>