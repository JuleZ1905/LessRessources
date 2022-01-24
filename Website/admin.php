<?php
session_start();
$isLoggedIn = false;
if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true) {
    $isLoggedIn = true;
} else {
    header('location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="lib/pictures/Logo_Icon.png" type="image/x-icon">
    <link href="lib/css/admin.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script defer src="lib/js/admin.js"></script>
    <title>Admin-Panel</title>
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

    <div class="Uebeerschrift">
        <p>Admin-Panel</p>
    </div>
<div class="all">
    <div class = "firstdiv">
        <form class="forms" action="" method="POST">
            <div class="forms_body">
                <div class="input_line centerDivContent">
                    <h1 id="data_input">Dateninput</h1>
                </div>
                <div class="input_line">
                    <p class="text_position">Ressource:</p>
                    <input type="radio" name="ress" value="Strom" id="ress" checked>
                    <label for="ress">Strom</label>
                </div>

                <div class="input_line">
                    <p class="text_position" for="menge">Menge:</p>
                    <input type="number" id="menge" name="menge" required min=1>
                </div>

                <div class="input_line">
                    <p class="text_position">Einheit:</p>
                    <input type="radio" name="einheit" value="kWh" id="einheit" checked>
                    <label for="einheit">kWh</label>
                </div>

                <div class="input_line">
                    <p class="text_position">Monat:</p>
                    <select name="month" id="months" required>
                        <option value="" selected disabled>-- select --</option>
                        <option value="1">Januar</option>
                        <option value="2">Februar</option>
                        <option value="3">März</option>
                        <option value="4">April</option>
                        <option value="5">Mai</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Dezember</option>
                    </select>
                </div>

                <div class="input_line">
                    <p class="text_position">Jahr: </p>
                    <select name="year" id="year" required>
                        <option value="" selected disabled>-- select --</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                    </select>
                </div>

                <div class="error centerDivContent">
                    <p class="inputError">Ungültiger Dateninput, bitte probiere es nochmal!</p>
                </div>

                <div class="input_line centerDivContent">
                    <button class="btn_submit" name="submitBtn" type="submit">Submit</button>
                </div>
            </div>
        </form>

        </div>

        <?php
        require_once 'lib/DB_connection/DB.php';

        function console_log($data)
        {
            $output = $data;
            if (is_array($output))
                $output = implode(',', $output);

            echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
        }


        if (isset($_POST['submitBtn'])) {
            $newResource = $_POST['ress'];
            $menge = $_POST['menge'];
            $einheit = $_POST['einheit'];
            $month = $_POST['month'];
            $year = $_POST['year'];

            $nRows = $db->query("SELECT Menge FROM Ressource WHERE Jahr = '$year' AND Monat = '$month';")->fetchColumn();

            if ($nRows > 0) {
                $sql = "UPDATE Ressource
                SET Menge = $menge + (SELECT Menge FROM Ressource WHERE Jahr = '$year' AND Monat = '$month')
                WHERE Jahr = '$year'
                  AND Monat = '$month';";
                $db->prepare($sql)->execute();
            } else {
                $sql = "INSERT INTO Ressource (Bezeichnung, Menge, Einheit, Monat, Jahr)
                VALUE (:newResource, :menge, :einheit, :month, :year);";

                $statement = $db->prepare($sql);
                $statement->execute([
                    ':newResource' => $newResource,
                    ':menge' => $menge,
                    ':einheit' => $einheit,
                    ':month' => $month,
                    ':year' => $year
                ]);
            }
            echo "<meta http-equiv='refresh' content='0'>";
        }

        if (isset($_POST["ressource"])) {
            $sql = "DELETE
            FROM Ressource
            WHERE Bezeichnung = :ressource
              AND Menge = :amount
              AND Einheit = :unit
              AND Monat = :month
              AND Jahr = :year";

            $statement = $db->prepare($sql);
            $statement->execute([
                ':ressource' => $_POST["ressource"],
                ':amount' => $_POST["amount"],
                ':unit' => $_POST["unit"],
                ':month' => $_POST["month"],
                ':year' => $_POST["year"]
            ]);
        }

    if (isset($_POST["ressource"])) {
        echo 'Hallo';
        $sql = "DELETE
        FROM Ressource
        WHERE Bezeichnung = :ressource
          AND Menge = :amount
          AND Einheit = :unit
          AND Monat = :month
          AND Jahr = :year";

        $statement = $db->prepare($sql);
        $statement->execute([
            ':ressource' => $_POST["ressource"],
            ':amount' => $_POST["amount"],
            ':unit' => $_POST["unit"],
            ':month' => $_POST["month"],
            ':year' => $_POST["year"]
        ]);
    }

    $sql1 = "SELECT Bezeichnung, Menge, Einheit, Monat, Jahr FROM Ressource ORDER BY Jahr, Monat";
    $stmt = $db->query($sql1);
    ?>

    <div class="dataTable">
        <h1 id="data_input">Datenbank</h1>
        <table class="fixed_header">
            <thead>
                <tr>
                    <th>Bezeichnung</th>
                    <th>Menge</th>
                    <th>Einheit</th>
                    <th>Monat</th>
                    <th>Jahr</th>
                    <th>löschen</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                    <tr>
                        <th>Bezeichnung</th>
                        <th>Menge</th>
                        <th>Einheit</th>
                        <th>Monat</th>
                        <th>Jahr</th>
                        <th>löschen</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                        <tr>
                            <td class="ressource"><?php echo htmlspecialchars($row['Bezeichnung']); ?></td>
                            <td class="amount"><?php echo htmlspecialchars($row['Menge']); ?></td>
                            <td class="unit"><?php echo htmlspecialchars($row['Einheit']); ?></td>
                            <td class="month"><?php
                                                switch ($row['Monat']) {
                                                    case 1:
                                                        echo "Januar";
                                                        break;
                                                    case 2:
                                                        echo "Februar";
                                                        break;
                                                    case 3:
                                                        echo "März";
                                                        break;
                                                    case 4:
                                                        echo "April";
                                                        break;
                                                    case 5:
                                                        echo "Mai";
                                                        break;
                                                    case 6:
                                                        echo "Juni";
                                                        break;
                                                    case 7:
                                                        echo "Juli";
                                                        break;
                                                    case 8:
                                                        echo "August";
                                                        break;
                                                    case 9:
                                                        echo "September";
                                                        break;
                                                    case 10:
                                                        echo "Oktober";
                                                        break;
                                                    case 11:
                                                        echo "November";
                                                        break;
                                                    case 12:
                                                        echo "Dezember";
                                                        break;
                                                    default:
                                                        break;
                                                }
                                                ?></td>
                            <td class="year"><?php echo htmlspecialchars($row['Jahr']); ?></td>
                            <td><img class="trash" src="lib/pictures/Trash_Icon.png" alt=""></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>