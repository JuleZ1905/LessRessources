<?php
// PDO initialization
$server = 'mysql:dbname=epiz_30590835_LessRessources;host=sql200.epizy.com';
$username = 'epiz_30590835';
$password = 'sha3EW6z7oy6uJ';
$opt = array
(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

try {
    $db = new PDO($server, $username, $password, $opt);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {
    die('Verbindung fehlgeschlagen: ' . $error->getMessage());
}
?>