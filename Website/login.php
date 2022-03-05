
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>

    <link rel="stylesheet" href="lib/css/login.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link rel="shortcut icon" href="lib/pictures/Logo_Icon.png" type="image/x-icon">
    <script defer src="lib/js/login.js"></script>
</head>

<body>

    <div class="main">
        <img class="logo" src="lib/pictures/Logo.png">
        <p class="sign">Login to Admin-Panel</p>
        <form class="form1" method="POST" action="login.php">
            <input class="name" type="text" name="name" placeholder="Username" required>
            <input class="password" type="password" name="password" placeholder="Password" required>
            <p id="loginError">Invalid username or password!</p>
            <div class="buttons">
                <button type="button" id="btn_back">Go back</button>
                <button type="submit" name="LOGIN" class="submit">Submit</button>
            </div>
        </form>
    </div>

<?php
session_start();
require_once 'lib/DB_connection/DB.php';

//will be executed if the Login button was clicked
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

    //verifies the password with the one in the database
    if (password_verify($password, $passwd_hash) && $db_username == $username) {
        $_SESSION['isLoggedIn'] = true;
        header('Location: index.php');
    } else {
        echo '<script> document.getElementById("loginError").style.display = "block"; </script>';
    }
}

?>
</body>

</html>