<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store</title>
</head>

<body>

</body>

</html>

<?php

require_once("../../Website/DB_Connection/dbContent/DB.php");



if (isset($_GET['cert']) && $_GET['cert'] == '1234' && isset($_GET['shelly'])) {
    $shelly = $_GET['shelly'];
    $result = round($shelly, 0, PHP_ROUND_HALF_UP);
    
    $sql = "INSERT INTO Ressource (Bezeichnung, Menge, Einheit, von, bis)
    VALUE (:newResource, :menge, :einheit, :von, :bis);";

    $statement = $db->prepare($sql);
    
    $statement->execute([
        ':newResource' => "Strom",
        ':menge' => $result,
        ':einheit' => "kWh",
        ':von' => date("y-m-d"),
        ':bis' => date("y-m-d")
    ]);
    
    echo date("Y-m-d");
    echo $result;
}
