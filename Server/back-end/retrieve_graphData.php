<?php

require 'db.php';

$link = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if (!$link) {
    die(mysqli_error($link));
}
if(isset($_POST['id']) && isset($_POST['type']) && isset($_POST['dataType'])){
    $id = $_POST['id'];
    $type = $_POST['type'];
    $dataType = $_POST['dataType'];
}              

$response = array();
/*
if ($dataType == "Water Level") {
    if ($type == "daily") {
        
        $query = "SELECT water from Water WHERE date_taken = CURDATE()";
        $result = mysqli_query($link, $query);
        $array = [];
        while ($store = mysqli_fetch_assoc($result)){
            $array[] = doubleval($store['water']);
        }
        $response['data'] = $array;

    }
     else if ($type == "weekly") {
        $query = "SELECT * FROM Water WHERE WEEK(date_taken) = WEEK(CURDATE())";
        $result = mysqli_query($link, $query);
        
        $updatedArray = array();
        $array = array();
        while ($store = mysqli_fetch_assoc($result)) { 
            $array[] = $store;
        }
        $newArray = array();
        for($i = 0; $i < count($array); $i++){
            $newArray[] = doubleval($array[$i]['water']);
        }
        $count = 0;
        for ($i = 0; $i < 7; $i++) {
            $number = 0.0;
            for ($i = 0; $i < 6; $i++) { // 6 data per day
                for ($x = 0; $x < 4; $x++) { // 4 average
                    $number = $number + $newArray[$count];
                    $count ++;
                }
                $number = $number / 4;
            }
            $number = $number / 6;
            $updatedArray[] = $number;
        }
        $response["data"] = $updatedArray;
        
    } else if ($type == "monthly") {
        $query = "SELECT * FROM Water WHERE MONTH(date_taken) = MONTH(CURDATE())";
        $result = mysqli_query($link, $query);
        $updatedArray = array();
        while ($store = mysqli_fetch_assoc($result)) {
            $number = 0.0;
            $count = 0;
            for ($i = 0; $i < 4; $i++) {
                for ($i = 0; $i < 7; $i++) { // 7 data every single day
                    for ($i = 0; $i < 6; $i++) { // 6 data per day
                        for ($x = 0; $x < 4; $x++) { // 4 average
                            $number = $number + doubleval($store[$count]['water']);
                            $count ++;
                        }
                        $number = $number / 4;
                    }
                    $number = $number / 6;
                }
                $number = $number / 7;
                $updatedArray[] = $number;
                $number = 0.0;
            }
        }
        $response["data"] = $updatedArray;
    }
}
*/
if ($dataType == "Humidity") {
    if ($type == "Daily") {
        $query = "SELECT humidity from Humidity WHERE date_taken = CURDATE()";
        $result = mysqli_query($link, $query);
        $array = [];
        while ($store = mysqli_fetch_assoc($result)){
            $array[] = doubleval($store['humidity']);
        }
        $response['data'] = $array;
         
    } else if ($type == "Weekly") {
        $query = "SELECT humidity from Humidity WHERE WEEK(date_taken) = WEEK(CURDATE())";
        $result = mysqli_query($link, $query);
        $array = [];
        while ($store = mysqli_fetch_assoc($result)){
            $array[] = $store;
        }
        $resultArray = [];
        $count = 0;
        
        for($x = 0; $x < 7; $x ++){
            $total = 0;
            for($i = 0; $i < 24; $i++){
             $total = $total + doubleval($array[$count]['humidity']);
             $count = $count + 1;
            }
            $resultArray[] = $total / 24;
        }
        $response['data'] = $resulyArray;
          
    } else if ($type == "Monthly") {         
        $query = "SELECT humidity from Humidity WHERE Month(date_taken) = Month(CURDATE())";
        $result = mysqli_query($link, $query);
        $array = [];
        while ($store = mysqli_fetch_assoc($result)){
            $array[] = $store;
        }
        $resultArray = [];
        $count = 0;
        
        for($x = 0; $x < 6; $x ++){
            $total = 0;
            for($i = 0; $i < 120; $i++){ // 5 days data
             $total = $total + doubleval($array[$count]['humidity']);
             $count = $count + 1;
            }
            $resultArray[] = $total / 120;
        }
        $response['data'] = $resulyArray;
    }
}
/*
 else if ($dataType == "Light Level") {
    if ($type == "daily") {

    } else if ($type == "weekly") {
        
    } else if ($type == "monthly") {
        
    }
} 
*/

else if ($dataType == "Temperature") {
    if ($type == "Daily") {
        $query = "SELECT temp from Temp WHERE date_taken = CURDATE()";
        $result = mysqli_query($link, $query);
        $array = [];
        while ($store = mysqli_fetch_assoc($result)){
            $array[] = doubleval($store['temp']);
        }
        $response['data'] = $array;
    } else if ($type == "Weekly") {
        $query = "SELECT temp from Temp WHERE WEEK(date_taken) = WEEK(CURDATE())";
        $result = mysqli_query($link, $query);
        $array = [];
        while ($store = mysqli_fetch_assoc($result)){
            $array[] = $store;
        }
        $resultArray = [];
        $count = 0;
        
        for($x = 0; $x < 7; $x ++){
            $total = 0;
            for($i = 0; $i < 24; $i++){
             $total = $total + doubleval($array[$count]['temp']);
             $count = $count + 1;
            }
            $resultArray[] = $total / 24;
        }
        $response['data'] = $resulyArray;
        
    } else if ($type == "Monthly") {
        $query = "SELECT temp from Temp WHERE Month(date_taken) = Month(CURDATE())";
        $result = mysqli_query($link, $query);
        $array = [];
        while ($store = mysqli_fetch_assoc($result)){
            $array[] = $store;
        }
        $resultArray = [];
        $count = 0;
        
        for($x = 0; $x < 6; $x ++){
            $total = 0;
            for($i = 0; $i < 120; $i++){ // 5 days data
             $total = $total + doubleval($array[$count]['temp']);
             $count = $count + 1;
            }
            $resultArray[] = $total / 120;
        }
        $response['data'] = $resulyArray; 
    }
}

echo json_encode($response);
