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
                Der korrekte Name f??r den hier bezeichneten ???Strom??? w??re die elektrische Energie (oder auch Strommenge sowie Elektrizit??tsmenge, wenn es um die ??bertragung ebenjener Energie geht), denn unter elektrischem Strom, kurz Strom genannt, versteht man eigentlich eine physikalische Erscheinung aus der Elektrizit??tslehre. Ihre physikalische Gr????e zur Messung ebenjener ist die Stromst??rke und ihre Einheit Ampere (kurz: A). Die zumeist verwendete Ma??einheit f??r die elektrische Energie hingegen, die wir auf unserer Webseite jedoch (inkorrekter Weise) der Verst??ndlichkeit halber als ???Strom??? bezeichnen, ist die Kilowattstunde (kurz: kWh). Dies ist lediglich eine gr????ere Ma??einheit f??r Joule (kurz: J), wobei eine Kilowattstunde ganze 3.600.000 Joule sind! Das ??quivalenz zu Joule w??ren die Wattsekunden (kurz: Ws). Zu erw??hnen, weswegen wir auf unserer Webseite die Werte lediglich in Kilowattstunden ??? oder gar gr????eren Einheiten ??? angeben, sollte an dieser Stelle selbsterkl??rend sein.
            </p>
        </div>
    </div>

    <div class="centerContent">
        <div class="infotext">
            <h1>Ma??nahmen</h1>
            <p class="text1">
                Jede_r Einzelne_r von uns kann seinen Teil dazu beitragen, indem er_sie den Stromverbrauch in seinem_ihrem Alltag reduziert. Hier ein paar Tipps:
                <br><br>- Ger??te abdrehen, anstatt diese stundenlang im Standby-Modus zu lassen (oft davon betroffen: Wasserkocher, Kaffeemaschinen, Stereoanlagen, Radiowecker, Fernseher, Spielekonsolen, Computer und Waschmaschinen)
                <br>- Bei ungenutzten Ger??ten den Stecker ziehen anstatt diese st??ndig im Stromkreis zu lassen
                <br>- Router ausschalten, wenn Internet nicht ben??tigt wird
                <br>- Stromfresser K??hlschrank:
                <br>- Lieber in einer k??hlen Gegend wie einem Keller stehen lassen und auf keinen Fall in der N??he eines Herdes, eines Backofen, einer Heizung oder einer Waschmaschine platzieren, da diese auch den K??hlschrank erw??rmen, weswegen ebenjener dem entgegenwirken muss.
                <br>- Keine hei??en Lebensmittel in den K??hlschrank geben, da auch diese den K??hlschrank erw??rmen. Der Umwelt zuliebe also besser ein wenig warten, bevor die Reste vom Mittagessen im K??hlschrank gelagert werden!
                <br>- Auch beim ??ffnen vom K??hlschrank wird dieser erhitzt, weswegen vermieden werden sollte, diese oft und lange offen zu lassen. Also auch daheim gilt, was bei Gefrierf??chern von Superm??rkten gefordert wird: Zuerst ??berlegen, dann ??ffnen und entnehmen!
                <br>- Ebenfalls durch dicke Eisschichten muss der K??hlschrank mehr Arbeit leisten, weswegen man den K??hlschrank regelm????ig abtauen sollte.
                <br>- Sparen beim Kochen:
                <br>- Die T??pfe sollten auf die richtige Kochplatte gestellt werden.
                <br>- Der Deckel sollte gut auf den Topf passen.
                <br>- M??glichst wenig Wasser zum Kochen nutzen, da das Wasser somit schneller erhitzt wird.
                <br>- Die Herdplatte kann bereits einige Minuten vorm Ende der Garzeit abgeschaltet und stattdessen die Restw??rme genutzt werden.
            </p>
        </div>
    </div>

    <div class="centerContent">
        <div class="infotext">
            <h1>Fun Facts</h1>
            <p class="text1">
                Island ist mit 50,8k kWh (Stand: 2015) Stromverbrauch pro Jahr und Kopf weltweit das Land mit dem h??chsten Stromverbrauch. Diese immensen Zahlen sind dadurch zu erkl??ren, dass dort viele Datencenter betrieben werden, welche wesentlich mehr Strom als s??mtliche Privathaushalte verbrauchen. Auch Norwegen hat mit 24,2k kWh (Stand: 2016) pro Jahr und Kopf einen hohen Stromverbrauch, da auch dieser Staat aufgrund der vorherrschenden Temperaturen gut f??r Rechenzentren geeignet ist.
                <br><br>In Wien flossen 2018 knapp 4.000GWh Strom f??r Dienstleistungen, 3.000GWh f??r private Haushalte, 843GWh f??r die Industrie und 644GWh f??r den Verkehr. [Anmerkung: 1GWh sind 1.000.000 kWh!]
            </p>
        </div>
    </div>


</body>

</html>