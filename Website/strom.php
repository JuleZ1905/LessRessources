<?php
session_start();
$isLoggedIn = false;
if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true) {
    $isLoggedIn = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Strom</title>
    <link rel="shortcut icon" href="lib/pictures/Logo_Icon.png" type="image/x-icon">
    <link href="lib/css/strom.css" rel="stylesheet">
    <link href="lib/css/general.css" rel="stylesheet">
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script defer src="lib/js/strom.js"></script>
</head>

<body>
    <nav class="navbar">
        <div class="logo"><img onclick="window.open('index.php','_self')" class="logo" src="lib/pictures/Logo.png" alt="LOGO"></div>
        <div class="push-left">
            <button id="menu-toggler" data-class="menu-active" class="hamburger">
                <span class="hamburger-line hamburger-line-top"></span>
                <span class="hamburger-line hamburger-line-middle"></span>
                <span class="hamburger-line hamburger-line-bottom"></span>
            </button>
            <ul id="primary-menu" class="menu nav-menu">
                <li class="menu-item current-menu-item"><a class="nav__link" href="index.php">Home</a></li>
                <li class="menu-item dropdown"><a class="nav__link" href="strom.php">Strom</a></li>
                <?php
                if ($isLoggedIn) {
                    echo '<li class="menu-item dropdown"><a class="nav__link" href="admin.php">Admin</a></li>';
                } else {
                    echo '<li class="menu-item dropdown"><a class="nav__link" href="login.php">Login</a></li>';
                }
                ?>
            </ul>
        </div>
    </nav>


    <div class="grid">


        <div class="content">
            <div class="random">
              <span class="nbr ltr">0</span>
              <span class="nbr ltr">0</span>
              <span class="nbr ltr">0</span>
              <span class="nbr ltr">0</span>
              <span class="nbr ltr">0</span>

            </div>
          </div>
          <script src='https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js'></script>
          <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <div class="chart">
            <canvas id="myChart"></canvas>
        </div>


    </div>
</body>

</html>