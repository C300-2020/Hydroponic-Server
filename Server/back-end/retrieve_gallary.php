<?php 

require 'db.php';

$link = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if (!$link) {
    die(mysqli_error($link));
}

if(isset($_POST['id'])){
    $id = $_POST['id'];
}

$queryImage = "Select link from Image Where id_plant =" . $id. " ORDER BY date_taken";
$resultImage = mysqli_query($link, $queryImage);

$images = array();
while ($image = mysqli_fetch_assoc($resultImage)) {
    $item = $image["link"];
    $images[] = $item;
}
//$responseImage = mysqli_fetch_assoc($resultImage);
$response["image"] = $images;


echo json_encode($response);

?>