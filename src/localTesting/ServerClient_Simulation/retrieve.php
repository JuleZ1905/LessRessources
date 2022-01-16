<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retrieve</title>
</head>

<body>

</body>

</html>


<?php

$json = file_get_contents("http://192.168.8.108/status");
$obj = json_decode($json);
$result = $obj->meters[0]->power;

$url = "http://localhost/LessRessources_Website/src/localTesting/ServerClient_Simulation/store.php?shelly=$result&cert=1234";

$curl = curl_init($url);
$resp = curl_exec($curl);
curl_close($curl);




/*
$url = "http://localhost/LessRess_Testing/ServerClient_Simulation/store.php";

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, "Hello=World&Foo=Bar&Baz=Wombat");

curl_exec ($curl);
curl_close ($curl);
*/