<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eingabemaske</title>
    <style>
        * {
            margin: 15px;
        }

        table {
            border-spacing: 0;
        }

        th,
        td {
            border: 0.5px solid black;
            padding: 15px;
        }

        .btn {
            width: 100px;
        }

        .forms {
            float: left;
            margin-right: 10%;
        }
    </style>
    <script src="JavaScript/script.js" defer></script>
</head>

<body>
    <h1>Eingabemaske</h1>
    <form class="forms" action="" method="POST">
        <label for="ress">Ressource: </label>
        <select name="ress" id="ress" required>
            <option value="" disabled selected>--Input--</option>
            <option value="Strom">Strom</option>
            <option value="Wasser">Wasser</option>
        </select>

        <br>

        <label for="menge">Menge: </label>
        <input type="number" id="menge" name="menge" required>

        <br>

        <label for="einheit">Einheit: </label>
        <select name="Einheit" id="einheit" required>
            <option value="" disabled selected>--Input--</option>
            <option value="kWh">kW/h</option>
            <option value="Liter">Liter</option>
        </select>

        <br>

        <label for="von">Von: </label>
        <input type="date" id="von" name="von" value="" min="2019-01-01" max="<?php echo date("Y-m-d"); ?>" required>

        <br>

        <label for="von">Bis: </label>
        <input type="date" id="bis" name="bis" value="" min="2019-01-01" max="<?php echo date("Y-m-d"); ?>" required>
        <br>
        <input class="btn" type="submit" value="Submit" name="submitBtn">
    </form>

    <?php
    require_once "../Website/DB_Connection/dbContent/DB.php";

    function console_log($data)
    {
        $output = $data;
        if (is_array($output))
            $output = implode(',', $output);

        echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
    }
    /*
    function clearDatabase() {
        console_log("Bin da");
        require_once "dbContent/DB.php";
        console_log("Bin immer noch da");
        $sql3 = "DELETE FROM Ressource
        WHERE pk_ressource_ID IN (SELECT pk_ressource_ID FROM Ressource);";
        $statement = $db->prepare($sql3);
        $statement->execute();
        echo "<meta http-equiv='refresh' content='0'>";
    }*/



    if (isset($_POST['submitBtn'])) {

        $newResource = $_POST['ress'];
        $menge = $_POST['menge'];
        $einheit = $_POST['Einheit'];
        $von = $_POST['von'];
        $bis = $_POST['bis'];

        $resources = array('Strom' => 'kWh', 'Wasser' => 'Liter');

        $dateOK = false;
        $valuesOK = false;

        if ($von < $bis) {
            $dateOK = true;
        }

        if (array_search($einheit, $resources) == $newResource) {
            $valuesOK = true;
        }

        if ($dateOK && $valuesOK) {
            $newResource . " " . $menge . " " . $einheit . " " . $von . " " . $bis . "";
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
        } else {
            echo 'ACHTUNG: Das Datum wurde zeitlich nicht richtig eingetragen. Bitte gib deine Daten nochmal ein!';
        }
        //echo "<meta http-equiv='refresh' content='0'>";
    }

    $sql1 = "SELECT Bezeichnung, Menge, Einheit, von, bis FROM Ressource ORDER BY von;";
    $stmt = $db->query($sql1);
    ?>

    <table>
        <thead>
            <tr>
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
    <button id="clearBTN">Clear</button>
</body>

</html>