<?php 

require 'db.php';

$link = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if (!$link) {
    die(mysqli_error($link));
}

if(isset($_POST['name']) && isset($_POST['date']) && isset($_POST['desc']) ){
    $name = $_POST['name'];
    $date = $_POST['date'];
    $desc = $_POST['desc']; 
}

$query = "INSERT INTO Plants (plant_name, date_planted, description) VALUES ('$name', '$date', '$desc')";

$result = mysqli_query($link, $query);

$response = array();
while ($store = mysqli_fetch_assoc($result)) {
    $response[] = $store;
}

?>