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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="lib/css/admin.css" rel="stylesheet">
    <link rel="shortcut icon" href="lib/pictures/Logo_Icon.png" type="image/x-icon">
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
            <div class="input_line data_input_div">
                <h1 id="data_input">Dateninput</h1>
            </div>
            <div class="input_line">
                <p class="text_position">Ressource:</p>
                <input type="radio" name="ress" value="Strom" id="ress" checked>
                <label for="ress">Strom</label>
            </div>

            <div class="input_line">
                <p class="text_position" for="menge">Menge:</p>
                <input type="number" id="menge" name="menge" required min=0>
            </div>

            <div class="input_line">
                <p class="text_position">Einheit:</p>
                <input type="radio" name="einheit" value="kWh" id="einheit" checked>
                <label for="einheit">kWh</label>
            </div>

            <div class="input_line">
                <p class="text_position">Von:</p>
                <input type="date" id="von" name="von" min="2019-01-01" max="<?php echo date("Y-m-d"); ?>" required>
            </div>

            <div class="input_line">
                <p class="text_position">Bis:</p>
                <input type="date" id="bis" name="bis" min="2019-01-01" max="<?php echo date("Y-m-d"); ?>" required>
            </div>
            <div class="input_line btn_submit_div">
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
        console_log("hello");
        $newResource = $_POST['ress'];
        $menge = $_POST['menge'];
        $einheit = $_POST['einheit'];
        $von = $_POST['von'];
        $bis = $_POST['bis'];

        $resources = array('Strom' => 'kWh', 'Wasser' => 'Liter');

        $dateOK = false;
        $valuesOK = false;
        $amountOK = false;


        if ($von < $bis) {
            $dateOK = true;
        }

        if (array_search($einheit, $resources) == $newResource) {
            $valuesOK = true;
        }

        if ($menge > 0) {
            $amountOK = true;
        }

        if ($dateOK && $valuesOK && $amountOK) {

            $sql = "INSERT INTO Ressource (Bezeichnung, Menge, Einheit, von, bis)
            VALUE (:newResource, :menge, :einheit, :von, :bis);";

            $statement = $db->prepare($sql);
            $statement->execute([
                ':newResource' => $newResource,
                ':menge' => $menge,
                ':einheit' => $einheit,
                ':von' => $von,
                ':bis' => $bis
            ]);
            echo "<meta http-equiv='refresh' content='0'>";
        } else {
            echo 'ACHTUNG: Das Datum wurde zeitlich nicht richtig eingetragen. Bitte gib deine Daten nochmal ein!';
        }  
    }

    $sql1 = "SELECT Bezeichnung, Menge, Einheit, von, bis FROM Ressource ORDER BY von;";
    $stmt = $db->query($sql1);
    ?>

    <div class="dataTable">
        <h1 id="data_input">Datenbank</h1>
        <table>
            <thead>
                <tr class="headRow">
                    <th>Bezeichnung</th>
                    <th>Menge</th>
                    <th>Einheit</th>
                    <th>Von</th>
                    <th>Bis</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['Bezeichnung']); ?></td>
                        <td><?php echo htmlspecialchars($row['Menge']); ?></td>
                        <td><?php echo htmlspecialchars($row['Einheit']); ?></td>
                        <td><?php echo htmlspecialchars($row['von']); ?></td>
                        <td><?php echo htmlspecialchars($row['bis']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>

</html>