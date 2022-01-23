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
    <script defer src="lib/js/admin.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Admin-Panel</title>
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

    <div class="Uebeerschrift">
        <p>Admin-Panel</p>
    </div>


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
                    <option value="Januar">Januar</option>
                    <option value="Februar">Februar</option>
                    <option value="März">März</option>
                    <option value="April">April</option>
                    <option value="Mai">Mai</option>
                    <option value="Juni">Juni</option>
                    <option value="Juli">Juli</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="Oktober">Oktober</option>
                    <option value="November">November</option>
                    <option value="Dezember">Dezember</option>
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

    $sql1 = "SELECT Bezeichnung, Menge, Einheit, Monat, Jahr FROM Ressource";
    $stmt = $db->query($sql1);
    ?>

    <div class="dataTable">
        <h1 id="data_input">Datenbank</h1>
        <table>
            <thead>
                <tr class="headRow">
                    <th><span class="bezeichnung">Bezeichnung</span></th>
                    <th><span class="bezeichnung">Menge</span></th>
                    <th><span class="bezeichnung">Einheit</span></th>
                    <th><span class="bezeichnung">Monat</span></th>
                    <th><span class="bezeichnung">Jahr</span></th>
                </tr>
            </thead>
            <tbody>

                <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                    <tr>
                        <td class="ressource"><?php echo htmlspecialchars($row['Bezeichnung']); ?></td>
                        <td class="amount"><?php echo htmlspecialchars($row['Menge']); ?></td>
                        <td class="unit"><?php echo htmlspecialchars($row['Einheit']); ?></td>
                        <td class="month"><?php echo htmlspecialchars($row['Monat']); ?></td>
                        <td class="year"><?php echo htmlspecialchars($row['Jahr']); ?></td>
                        <td><img class="trash" src="lib/pictures/Trash_Icon.png" alt=""></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>

</html>