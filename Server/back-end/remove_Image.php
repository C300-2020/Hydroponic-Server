<?php 

require 'db.php';

$link = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if (!$link) {
    die(mysqli_error($link));
}
 
$date = new DateTime();     
$query = "Select * from Image WHERE date_taken != YEAR(CURDATE())";

$result = mysqli_query($link, $query) or die(mysqli_error($link));

$response = array();
while ($store = mysqli_fetch_assoc($result)) {
    $response[] = $store;
}

for ($i = 0; $i < count($response); $i++) {
   echo json_encode($response[$i]['link']);
   $imageUrl = $response[$i]['link'];
   if(file_exists($imageUrl)){
      unlink($imageUrl);
   }
   
   $deletequery = "DELETE FROM Image WHERE id_image = ".$response[$i]['id_image'];
   $resultDelete = mysqli_query($link, $deletequery);
}


?>