<?php 

require 'db.php';

$link = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if (!$link) {
    die(mysqli_error($link));
}

$query = "Select * from Plants";

$result = mysqli_query($link, $query);

$response = array();
while ($store = mysqli_fetch_assoc($result)) {
    $response[] = $store;
}

for ($i = 1; $i <= count($response); $i++) {

    
    
    // humidity
    $queryHumidity = "Select humidity from Humidity Where id_plant =" . $i. " ORDER BY date_taken DESC, time_taken DESC";
    $resultHumidity = mysqli_query($link, $queryHumidity);
    $humidities = array();
    while ($humidity = mysqli_fetch_assoc($resultHumidity)) {
        $item = doubleval($humidity["humidity"]);
        $humidities[] = $item;
    }
    $lastHumidityRecord = $humidities[0];
    $response[$i-1]["humidity"] = $lastHumidityRecord;
    
    // temp
    $queryTemp = "Select temp from Temp Where id_plant =" . $i. " ORDER BY date_taken DESC, time_taken DESC";
    $resultTemp = mysqli_query($link, $queryTemp);
    $temps= array();
    while ($temp = mysqli_fetch_assoc($resultTemp)) {
        $item = doubleval($temp["temp"]);
        $temps[] = $item;
    }
    $lastTempRecord = $temps[0];
    $response[$i-1]["temp"] = $lastTempRecord;
    
    // Image
    $queryImage = "Select link from Image Where id_plant =" . $i. " ORDER BY date_taken DESC, time_taken DESC";
    $resultImage = mysqli_query($link, $queryImage);

    $images = array();
    while ($image = mysqli_fetch_assoc($resultImage)) {
        $item = $image["link"];
        $images[] = $item;
    }
    $lastImageRecord = $iamges[0];
    $response[$i-1]["image"] = $lastImageRecord;
    
    /*
    // water
    $queryWater = "Select water from Water Where id_plant =".$i ;
    $resultWater = mysqli_query($link, $queryWater);
    $waters = array();
    while ($water = mysqli_fetch_assoc($resultWater)) {
        $item = doubleval($water["water"]);
        $waters[] = $item;
    }
    $lastWaterRecord = $waters[count($response)-1];
    $response[$i-1]["water"] = $lastWaterRecord;
    
    // light
    $queryLight = "Select light from Light Where id_plant =" . $i;
    $resultLight = mysqli_query($link, $queryLight);
    $lights = array();
    while ($light = mysqli_fetch_assoc($resultLight)) {
        $item = intval($light["light"]);
        $lights[] = $item;
    }
    $lastLightRecord = $lights[count($response)-1];
    $response[$i-1]["light"] = $lastLightRecord;
    */
    
    //$responseImage = mysqli_fetch_assoc($resultImage);
    $lastImageRecord = $images[count($response)-1];
    $response[$i-1]["image"] = $lastImageRecord;
}

echo json_encode($response);

?>