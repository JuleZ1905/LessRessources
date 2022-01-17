<?php
    session_start();
    require_once 'lib/DB_connection/DB.php';

    if (isset($_POST['LOGIN'])) {
        $sql = "SELECT password FROM Admin;";
        $stmt = $db->query($sql);
        $stmt2 = $stmt->fetch(PDO::FETCH_ASSOC);

        $sql2 = "SELECT username FROM Admin;";
        $stmt3 = $db->query($sql2);
        $stmt4 = $stmt3->fetch(PDO::FETCH_ASSOC);

        $db_username = array_values($stmt4)[0];
        $passwd_hash = array_values($stmt2)[0];

        $password = $_POST['password'];
        $username = $_POST['name'];

        if (password_verify($password, $passwd_hash) && $db_username == $username) {
            $_SESSION['isLoggedIn'] = true;
            header('Location: index.php');
        } else {
            echo 'Falscher username oder falsches Passwort';
        }
    }

    ?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" a href="lib/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
</head>

<body>

    <div class="container form-popup" id="myForm">
        <img src="lib/pictures/neu Logo.png" />
        <form method="POST" action="">
            <div class="form-input">
                <input type="text" name="name" placeholder="Enter your username" />
            </div>
            <div class="form-input">
                <input type="password" name="password" placeholder="Enter your password" />
            </div>
            <input type="submit" name="LOGIN" class="btn-login" />
        </form>
    </div>


</body>

</html>