<?php
header('Content-Type: application/json; charset=utf-8');

require_once 'Seeder.php';

$data = Seeder::seed();
echo json_encode($data);


