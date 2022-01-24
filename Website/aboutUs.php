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
    <title>LessRessources</title>
    <link rel="shortcut icon" href="lib/pictures/Logo_Icon.png" type="image/x-icon">
    <link href="lib/css/ueberuns.css" rel="stylesheet">
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
                <li class="menu-item dropdown"><a class="nav__link" href="aboutUs.php">Über uns</a></li>
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

<div class = "Uebeerschrift">
        <p> Über uns </p>
</div>
    </div>
    <div class = "bilder">
        <figure class="snip1566">
          <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample14.jpg" alt="sq-sample14" />
          <figcaption><p>Zangl</p></figcaption>
          <a href="#"></a>
        </figure>
        <figure class="snip1566"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample17.jpg" alt="sq-sample17" />
          <figcaption><p>Jaros</p></figcaption>
          <a href="#"></a>
        </figure>
        <figure class="snip1566"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample19.jpg" alt="sq-sample19" />
          <figcaption><p>Brunner</p></figcaption>
          <a href="#"></a>
        </figure>
        <figure class="snip1566"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample20.jpg" alt="sq-sample20" />
          <figcaption><p>Klenner</p></figcaption>
          <a href="#"></a>
        </figure>
    </div>
    <div class="text">
        Wir, LessRessources, sind ein vierköpfiges Team, das sich im Rahmen eines informationstechnischen Projektes zusammengefunden hat. Unser Projektleiter ist Julian Zangl, die stellvertretende Projektleiterin Katharina Jaros und unsere weiteren beiden Mitglieder
        heißen Katharina Klenner und Hannah Brunner.
    </div>


    <div class="footer">
        <p>Hallo Leuteee</p>
    </div>

</body>

</html>