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
    <div class="top">
        <div class="chart">
            <canvas id="myChart"></canvas>
        </div>
    </div>
    <div class="centerContent">
        <div class="infotext">
            <h1>Allgemeines</h1>
            <p class="text1">
                Der korrekte Name für den hier bezeichneten „Strom“ wäre die elektrische Energie (oder auch Strommenge sowie Elektrizitätsmenge, wenn es um die Übertragung ebenjener Energie geht), denn unter elektrischem Strom, kurz Strom genannt, versteht man eigentlich eine physikalische Erscheinung aus der Elektrizitätslehre. Ihre physikalische Größe zur Messung ebenjener ist die Stromstärke und ihre Einheit Ampere (kurz: A). Die zumeist verwendete Maßeinheit für die elektrische Energie hingegen, die wir auf unserer Webseite jedoch (inkorrekter Weise) der Verständlichkeit halber als „Strom“ bezeichnen, ist die Kilowattstunde (kurz: kWh). Dies ist lediglich eine größere Maßeinheit für Joule (kurz: J), wobei eine Kilowattstunde ganze 3.600.000 Joule sind! Das Äquivalenz zu Joule wären die Wattsekunden (kurz: Ws). Zu erwähnen, weswegen wir auf unserer Webseite die Werte lediglich in Kilowattstunden – oder gar größeren Einheiten – angeben, sollte an dieser Stelle selbsterklärend sein.
            </p>
        </div>
    </div>

    <div class="centerContent">
        <div class="infotext">
            <h1>Maßnahmen</h1>
            <p class="text1">
                Jede_r Einzelne_r von uns kann seinen Teil dazu beitragen, indem er_sie den Stromverbrauch in seinem_ihrem Alltag reduziert. Hier ein paar Tipps:
                <br><br>- Geräte abdrehen, anstatt diese stundenlang im Standby-Modus zu lassen (oft davon betroffen: Wasserkocher, Kaffeemaschinen, Stereoanlagen, Radiowecker, Fernseher, Spielekonsolen, Computer und Waschmaschinen)
                <br>- Bei ungenutzten Geräten den Stecker ziehen anstatt diese ständig im Stromkreis zu lassen
                <br>- Router ausschalten, wenn Internet nicht benötigt wird
                <br>- Stromfresser Kühlschrank:
                <br>- Lieber in einer kühlen Gegend wie einem Keller stehen lassen und auf keinen Fall in der Nähe eines Herdes, eines Backofen, einer Heizung oder einer Waschmaschine platzieren, da diese auch den Kühlschrank erwärmen, weswegen ebenjener dem entgegenwirken muss.
                <br>- Keine heißen Lebensmittel in den Kühlschrank geben, da auch diese den Kühlschrank erwärmen. Der Umwelt zuliebe also besser ein wenig warten, bevor die Reste vom Mittagessen im Kühlschrank gelagert werden!
                <br>- Auch beim Öffnen vom Kühlschrank wird dieser erhitzt, weswegen vermieden werden sollte, diese oft und lange offen zu lassen. Also auch daheim gilt, was bei Gefrierfächern von Supermärkten gefordert wird: Zuerst überlegen, dann öffnen und entnehmen!
                <br>- Ebenfalls durch dicke Eisschichten muss der Kühlschrank mehr Arbeit leisten, weswegen man den Kühlschrank regelmäßig abtauen sollte.
                <br>- Sparen beim Kochen:
                <br>- Die Töpfe sollten auf die richtige Kochplatte gestellt werden.
                <br>- Der Deckel sollte gut auf den Topf passen.
                <br>- Möglichst wenig Wasser zum Kochen nutzen, da das Wasser somit schneller erhitzt wird.
                <br>- Die Herdplatte kann bereits einige Minuten vorm Ende der Garzeit abgeschaltet und stattdessen die Restwärme genutzt werden.
            </p>
        </div>
    </div>

    <div class="centerContent">
        <div class="infotext">
            <h1>Fun Facts</h1>
            <p class="text1">
                Island ist mit 50,8k kWh (Stand: 2015) Stromverbrauch pro Jahr und Kopf weltweit das Land mit dem höchsten Stromverbrauch. Diese immensen Zahlen sind dadurch zu erklären, dass dort viele Datencenter betrieben werden, welche wesentlich mehr Strom als sämtliche Privathaushalte verbrauchen. Auch Norwegen hat mit 24,2k kWh (Stand: 2016) pro Jahr und Kopf einen hohen Stromverbrauch, da auch dieser Staat aufgrund der vorherrschenden Temperaturen gut für Rechenzentren geeignet ist.
                <br><br>In Wien flossen 2018 knapp 4.000GWh Strom für Dienstleistungen, 3.000GWh für private Haushalte, 843GWh für die Industrie und 644GWh für den Verkehr. [Anmerkung: 1GWh sind 1.000.000 kWh!]
            </p>
        </div>
    </div>


</body>

</html>