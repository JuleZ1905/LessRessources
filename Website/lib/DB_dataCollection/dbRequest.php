<?php
header('Content-Type: application/json; charset=utf-8');

require_once 'Seeder.php';
//outputs json data from Seeder class, which can be further used in strom.js
$data = Seeder::seed();
echo json_encode($data);


