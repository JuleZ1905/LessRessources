<?php

//fills an associative array as json data from database
class Seeder
{
    public static function seed()
    {
        require_once '../DB_connection/DB.php';

        $sql = "SELECT Jahr, Monat, Menge FROM Ressource ORDER BY Jahr, Monat;";
        $stmt = $db->query($sql);
        $data = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[$row["Jahr"]][$row["Monat"]] = $row["Menge"];
        }

        return $data;
    }
}
