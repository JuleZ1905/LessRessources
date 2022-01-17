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
    <link href="lib/css/css.css" rel="stylesheet">
</head>

<body>
    <div class="navbar">
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="aboutUs.php">Über uns</a></li>
                <li><a href="strom.php">Strom</a></li>
                <?php
                if ($isLoggedIn) {
                    echo '<li><a href="admin.php">Admin</a></li>';
                } else {
                    echo '<li><a href="login.php">Login</a></li>';
                }
                ?>
            </ul>
        </nav>
    </div>



    <div class="less">
        LessRessources<br>
        <span style="font-size:40px">Stromverbrauch der HTL Rennweg</span>
    </div>

    <div class="background">
    </div>





  <div class="text">
    <p>
    Das vierköpfige Team von „LessRessources“ aus der 4AX hat sich im Rahmen eines ITP-Projektes zusammengefunden,
    um den Ressourcenverbrauch an der Schule zu erheben <br>und gegebenenfalls auch zu reduzieren. Aufgrund von Zeitmangel für das erste, größere ITP-Projekt,
    befassen sie sich vorerst lediglich mit der Erfassung und Darstellung des Stromverbrauches auf ihrer eigens für das Projekt angelegten Website (lessressources.epizy.com).
    Somit soll für die Zukunft bewerkstelligt werden, inwieweit sich der Ressourcenverbrauch in den vergangenen Monaten verbessert oder auch verschlechtert hat.
        Das vierköpfige Team von „LessRessources“ aus der 4AX hat sich im Rahmen eines ITP-Projektes zusammengefunden,<br>
        um den Ressourcenverbrauch an der Schule zu erheben und gegebenenfalls auch zu reduzieren. Aufgrund von Zeitmangel für das erste, größere ITP-Projekt,
        befassen sie sich vorerst lediglich mit der Erfassung und Darstellung <br>des Stromverbrauches auf ihrer eigens für das Projekt angelegten Website (lessressources.epizy.com).
        Somit soll für die Zukunft bewerkstelligt werden, inwieweit sich der Ressourcenverbrauch in den vergangenen Monaten verbessert oder auch verschlechtert hat.
            Das vierköpfige Team von „LessRessources“ aus der 4AX hat sich im Rahmen eines ITP-Projektes zusammengefunden,<br>
            um den Ressourcenverbrauch an der Schule zu erheben und gegebenenfalls auch zu reduzieren. Aufgrund von Zeitmangel für das erste, größere ITP-Projekt,
            befassen sie sich vorerst lediglich mit der Erfassung und Darstellung des Stromverbrauches auf ihrer eigens für das Projekt angelegten Website (lessressources.epizy.com).
            Somit soll für die Zukunft bewerkstelligt werden, inwieweit sich der Ressourcenverbrauch in den vergangenen Monaten verbessert oder auch verschlechtert hat.
                Das vierköpfige Team von „LessRessources“ aus der 4AX hat sich im Rahmen eines ITP-Projektes zusammengefunden,
                um den Ressourcenverbrauch an der Schule zu erheben <br>und gegebenenfalls auch zu reduzieren. Aufgrund von Zeitmangel für das erste, größere ITP-Projekt,
                befassen sie sich vorerst lediglich mit der Erfassung und Darstellung des Stromverbrauches auf ihrer eigens für das Projekt angelegten Website (lessressources.epizy.com).
                Somit soll für die Zukunft bewerkstelligt werden, inwieweit sich der Ressourcenverbrauch in den vergangenen Monaten verbessert oder auch verschlechtert hat.
                    Das vierköpfige Team von „LessRessources“ aus der 4AX hat sich im Rahmen eines ITP-Projektes zusammengefunden,<br>
                    um den Ressourcenverbrauch an der Schule zu erheben und gegebenenfalls auch zu reduzieren. Aufgrund von Zeitmangel für das erste, größere ITP-Projekt,
                    befassen sie sich vorerst lediglich mit der Erfassung und Darstellung <br>des Stromverbrauches auf ihrer eigens für das Projekt angelegten Website (lessressources.epizy.com).
                    Somit soll für die Zukunft bewerkstelligt werden, inwieweit sich der Ressourcenverbrauch in den vergangenen Monaten verbessert oder auch verschlechtert hat.
                        Das vierköpfige Team von „LessRessources“ aus der 4AX hat sich im Rahmen eines ITP-Projektes zusammengefunden,<br>
                        um den Ressourcenverbrauch an der Schule zu erheben und gegebenenfalls auch zu reduzieren. Aufgrund von Zeitmangel für das erste, größere ITP-Projekt,
                        befassen sie sich vorerst lediglich mit der Erfassung und Darstellung des Stromverbrauches auf ihrer eigens für das Projekt angelegten Website (lessressources.epizy.com).
                        Somit soll für die Zukunft bewerkstelligt werden, inwieweit sich der Ressourcenverbrauch in den vergangenen Monaten verbessert oder auch verschlechtert hat.
    </p>
 </div>


<!--
<figure class="snip1477">
    <img src="../../lib/strom.jpg" />
    <div class="title">
        <div>
            <h2>verbrauchter</h2>
            <h4>Strom</h4>
        </div>
    </div>
    <figcaption>
        <p>Which is worse, that everyone has his price, or that the price is always so low.</p>
    </figcaption>
    <a href="#"></a>
</figure>
-->
    <div class="footer">
        <p>Hallo Leuteee</p>
    </div>

</body>

</html>