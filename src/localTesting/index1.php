<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shelly</title>
</head>

<body>


    <?php

    $json = file_get_contents("http://192.168.8.108/status");
    $obj = json_decode($json);
    $result = $obj->meters[0]->power;
    echo $json.JSON_PRETTY_PRINT;
    $resType = gettype($result);
    echo '<h1> Current power draw: ' . $result . ' W</h1>';
    echo 'type: ' . $resType;

    
    $url = "https://www.solarweb.com/ActualData/GetCompareDataForPvSystem?pvSystemId=61447762-f171-45f3-b8f6-bb50d6a95756&_=1641894932801";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
    $headers = array(
    
      //'Accept: application/json, text/javascript, */*; q=0.01',
    
      'X-Requested-With: XMLHttpRequest',
      'Accept-Language: en-GB,en-US;q=0.9,en;q=0.8',
      'Cookie: CookieConsent={stamp:%274McrXPH8pJertmQOCkCbMKM3dLVfQTi+ySrvquGVuUKEK7Ff1YECvg==%27%2Cnecessary:true%2Cpreferences:true%2Cstatistics:true%2Cmarketing:true%2Cver:1%2Cutc:1638869671226%2Cregion:%27at%27}; _ga=GA1.2.1566748909.1638869679; lbc=!zBAdMbRzj/BBwlQCzlnZZspKi6GJAFGMcJ3rmniU3NCwBQXoSN5GtXjJkC5AMqrW6KkGcrw9cg9P0A1zbqhK1A/D9RoAFUGgfaLgQCar3MI=; TS01329c72=015bdaa26858ed62267ddaa7e4e4d3a0caf754b32af586fa1e93b49e910209d7f2054693c19e0576cfd8cf9453fb5fdc188a4b413c; __RequestVerificationToken=BV6aLVVt2As4NqpP_dUEdYHjhYPqDq3c3tLIvqnuLOuozAdmO1Js4u3KgdnQGjl2FjImurnHlUZ5NBLsk00j6h-mZgY1; _gid=GA1.2.1667007994.1641894909; OpenIdConnect.nonce.1mWeqldI1jn5owCnMrizSKkcKS9LPMZ5p2Cca5YGQL0%3D=VUVkM1VvRV92R2pYWVllbmJhWXctZFdmMmJNN2tYT0tYdTV2UjlTamR1SjBDZ1NYS19QdDlSN0o4SG1xQ2lEYUZnSmxIOExHamdIUnB5R0JPcWFOTGJMbDVZQ0Z5R3hBQVZoYWd1WHJ5MDZHS1hMcW1TZWRJTmdPdlp0aFk1Qnl0R3VQY05JMEpyNWM3SktIdzYtWjJVRDBPbHBtVDRuZ0pXS3VmSzIwSUJ5Q1VJNDNYU1Q5eHhoSFJKa2tUZVFSVHZXLVpFMFpVRjUwVmdlb2lQWHlvd2lXZjA0; .AspNet.Auth=1YxYQUsyDq3m-SPx1-323Alo8q2CEvwdZD57CZKcx2L9KFePJ_eMFMDCken-OUB8AKxgdQ7lBIPlJXcXr0QodM2lFUYdkcsqtWIzT5Eci9NV-Gt8VMB_tk4vd9ukfB0EiVzcBhoHkr9XEjZkkzXzLepiM8R3HyXIX0kILS7_ylL1V4EWvaI0VwhSBYmjJ5reZjBlnVVHVxizig00wkKUCB42SUE608QdNjbXsqd-bFOvlYRMj1vuXNHh4TMz_1t8XDdTMTd8p_T51pRYqhH0uyeatHHORY_5oW7Cx9sTdJrt5TZh_aTHo0x--u6AW0Giggn4pBjchaiSoXNGQ9fPf4qAINNj5U4gkaxL4F3D2gXIjTERAQ0C1xtaEDEyowvS3DmI2TPTIgGOgxB34wKtjyf2XkCFV1AUFHJKkVFX3QWvcK0m; TimeFormat=HH:mm; Culture=de; DateFormat=DD.MM.YYYY'
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    
    //for debug only!
    //curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    //curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    
    $resp = curl_exec($curl);
    var_dump($resp);
    echo '<br>';
    echo '<br>';
    var_dump(curl_getinfo($curl));
    curl_close($curl);

    ?>

</body>

</html>