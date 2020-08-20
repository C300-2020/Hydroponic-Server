<?php
    require __DIR__ . '/vendor/autoload.php';

    use Kreait\Firebase\Factory;

    $firebase = (new \Firebase\Factory())
        ->withCredentials(__DIR__.'/accountKey/rasppi-70657-firebase-adminsdk-882sy-2128342691.json')
        ->withDatabaseUri('https://hydrophonic-app.firebaseio.com')
        ->create();;

    $database = $firebase->getDatabase();

    //final DatabaseReference refLight = database.getReference(set).child("controls").child("light");

    $set = "controls";
    $refLight = $database->getReference($set."/1/light");
    $refWater = $database->getReference($set."/1/water");
    $valueLight = $refLight->getValue();
    $valueWater = $refWater->getValue();

    

    if(isset($_POST['light'])){
       $refControls = $database->getReference($set."/1"); 
       if ($valueLight == "on"){
            $array = array();
            $array["light"] = "off";
            $refControls->update($array);
        } else {
            $array = array();
            $array["light"] = "on";
            $refControls->update($array); 
        }
        echo '<meta http-equiv="refresh" content="1">';      
    }
    
     if(isset($_POST['water'])){
       $refControls = $database->getReference($set."/1");
       print "asdsd" ;
       if ($valueWater == "on"){
            $array = array();
            $array["water"] = "off";
            $refControls->update($array);
        } else {
            $array = array();
            $array["water"] = "on";
            $refControls->update($array); 
        } 
        echo '<meta http-equiv="refresh" content="1">';     
    }
    
    print "Light : " . $valueLight . "<br>Water : " . $valueWater;
    
    if(isset($_POST['water']) == false &&  isset($_POST['light']) == false){
        
    
?>

<form method="post" action="onORoff2.php">
   <button name="light" value="0" type="submit"> Toggle Light</button>
   <button name="water" value="0" type="submit"> Toggle Water</button>
</form>

<?php 
    }


?>