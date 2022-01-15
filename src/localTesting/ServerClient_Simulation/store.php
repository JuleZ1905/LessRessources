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

if (isset($_GET['cert']) && $_GET['cert'] == '1234' && isset($_GET['shelly'])){
    $shelly = $_GET['shelly'];
    echo $shelly;
}
