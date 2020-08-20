<?php 

require 'db.php';

$link = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if (!$link) {
    die(mysqli_error($link));
}

$response = array();

$queryWater = "Select water from Water" ;
    $resultWater = mysqli_query($link, $queryWater);
    $waters = array();
    while ($water = mysqli_fetch_assoc($resultWater)) {
        $item = doubleval($water["water"]);
        $waters[] = $item;
    }
    $lastWaterRecord = $waters[count($response)-1];
    $response["water"] = $lastWaterRecord;

echo json_encode($response);
?>