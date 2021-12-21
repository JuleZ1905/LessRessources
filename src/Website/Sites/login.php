<?php
if (isset($POST['username'])){
    //TODO Daten überprüfen
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" a href="../../css/login.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../../js/dialoge.js">
        <link rel="stylesheet" href="../../css/dialoge.css">
        <meta charset="UTF-8">
    </head>
    <body>
    <main>
        <div class="container">
            <img src="../../lib/logo.jpg"/>
            <form method="post" action="#">
                <div class="form-input">
                    <input type="text" name="text" placeholder="Enter your username"/>
                </div>
                <div class="form-input">
                    <input type="password" name="password" placeholder="Enter your password"/>
                </div>
                <input type="submit" type="submit" value="LOGIN" class="btn-login"/>
            </form>
        </div>
    </main>

    <div class="dialog" id="loslegen-dialog">
        <a href="#" role="button" class="dialog-schliessen-button" onclick="dialogSchliessen('loslegen-dialog')">
            <p>test</p>
        </a>
        <h3>Jetzt Registrieren!</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore, ipsa ad doloribus perferendis debitis dignissimos facilis beatae architecto aspernatur quae tempora repellat nihil fugiat quod!</p>
        <form action="">
            <input type="text" placeholder="Vorname" class="eingabefeld">
            <input type="text" placeholder="Nachname" class="eingabefeld">
            <input type="email" placeholder="Email-Adresse" class="eingabefeld">
            <input type="password" placeholder="Passwort" class="eingabefeld">
            <input type="submit" value="Loslegen!">
        </form>
    </div>
    <script src="../../js/dialoge.js"></script>
    </body>
</html>