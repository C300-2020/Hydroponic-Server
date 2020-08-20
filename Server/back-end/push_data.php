<?php
require 'db.php';

$link = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if (!$link) {
    die(mysqli_error($link));
}

//$input = $_POST["datetime"];
// $input = '06/10/2011 19:00:02'; 
//$datetime = strtotime($input);

if (isset($_POST["id_plant"])) {
    $id_plant = $_POST["id_plant"];
} else {
    $row["status"] = $status;
    $row["message"] = "Unsuccessful.";
    echo json_encode($row); 
}
/*
if (isset($_POST["water"])) {
   $water = $_POST["water"];
   $query = "INSERT INTO Water (water, date_taken, time_taken, id_plant) VALUES ($water, NOW(), NOW(), $id_plant)";
}
if (isset($_POST["light"])) {
   $light = $_POST["light"];
   $query = "INSERT INTO Light (light, date_taken, time_taken, id_plant) VALUES ($light, NOW(), NOW(), $id_plant)";
}
*/

if (isset($_POST["humidity"])) {
   $humidity = $_POST["humidity"];
   $query = "INSERT INTO Humidity (humidity, date_taken, time_taken, id_plant) VALUES ($humidity, NOW(), NOW(), $id_plant)";
}

if (isset($_FILES["image"])) {
   $targetPath = "../plantImg/";
   $date = date('Y-m-d_His');    //2020-08-05 12.jpg
   $name = $_FILES['image']['name'];
   $ext = pathinfo($name, PATHINFO_EXTENSION);
   $completePath = $targetPath.$date.".".$ext;
   move_uploaded_file($_FILES['image']['tmp_name'], $completePath);
   $query = "INSERT INTO Image (link, date_taken, time_taken, id_plant) VALUES ('$completePath', NOW(), NOW(), $id_plant)";
}

if (isset($_POST["temp"])) {
   $temp = $_POST["temp"];
   $query = "INSERT INTO Temp (temp, date_taken, time_taken, id_plant) VALUES ($temp, NOW(), NOW(), $id_plant)";
}

$status = mysqli_query($link, $query) or die(mysqli_error($link));
if($status) {
    $row["status"] = $status;
    $row["message"] = "Successfully.";
    echo json_encode($row);
} else {
    $row["status"] = $status;
    $row["message"] = "Unsuccessful.";
    echo json_encode($row);
}

mysqli_close();
?>