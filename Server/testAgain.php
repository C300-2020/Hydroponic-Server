<?php 

require 'db.php';

$link = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if (!$link) {
    die(mysqli_error($link));
}


$response = array();
$query = "Select water from Water WHERE date_taken = CURDATE()";
        $result = mysqli_query($link, $query);
        
        $array = [];
        while ($store = mysqli_fetch_assoc($result)) {
            $array[] = doubleval($store['water']);  
        }
        $updatedArray = [];
                    $count = 0;
                    for ($i = 0; $i < 6; $i++) {
                         $number = 0.0;
                        for ($x = 0; $x < 4; $x++) {
                            $number = $number + doubleval($array[$count]);
                            $count ++;
                        }
                        $number = $number / 4;
                        $updatedArray[] = $number; // 6 data
                    }
        $response["data"] = $updatedArray;
        
?>