<?php
require 'db.php';

$link = mysqli_connect($db_host, $db_username, $db_password, $db_name);

if (!$link) {
    die(mysqli_error($link));
}                                                                                     

$query = "Select * from Plants";

$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result);
        if(!empty(($row))){
            $id = $row['id_plant'];
        }    
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title></title>
    </head>
    <script>
        var firebaseConfig = {
        apiKey: "",
        authDomain: ".firebaseapp.com",
        databaseURL: "https://.firebaseio.com",
        projectId: "",
        storageBucket: ".appspot.com",
        messagingSenderId: "499375944304",
        appId: "1:499375944304:web:520227c12471f4ec2fbab5",
        measurementId: "G-ZF1314QC0Y"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        firebase.analytics();                         
        const db = firebase.database();
        
        
        firebase.database().ref('controls/' + 1).on('value', function(snapshot) {
            console.log(snapshot.val());   
            snapshot.forEach(function(childSnapshot) {
              var childData = childSnapshot.val();
              console.log("ChildData" + childData.light)
              id = snapshot.val();
              var checkboxLight = document.querySelector("#light");
              var checkboxWater = document.querySelector("#water");
              if (childData.light == "on"){
                checkboxLight.prop("checked", true);
              } else {
                checkboxLight.prop("checked", false);
              } 
               if (childData.water == "on"){
                checkboxWater.prop("checked", true);
              } else {
                checkboxWater.prop("checked", false);
              } 
       
        
        $(document).ready(function () {      
             $(".checkbox").on('change' , function(){
                var checkboxLight = document.querySelector("#light");
                var checkboxWater = document.querySelector("#water");
                var light = "on";
                var water = "on";
                if(checkboxLight.checked){
                    light = "on";  
                } else {
                    light = "off";
                }
                if(checkboxWater.checked){
                    water = "on";  
                } else {
                    water = "off";
                }
                firebase.database().ref('controls/'+1).set({
                    light: light,
                    water: water,
                  }, function(error) {
                    if (error) {
                      // The write failed...
                      console.log("Error");
                    } else {
                      // Data saved successfully!
                      console.log("Success");
                    }
                  });
              });
             
              
            });
         });
        });
        
    </script>
    <script src="connect_firebase.js"></script>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        /* Float four columns side by side */
        .column {
            float: left;
            width: 10%;
            padding: 0 5px;
        }

        .rowB {margin: 0 -5px;}

        /* Clear floats after the columns */
        .rowB:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Responsive columns */
        @media screen and (max-width: 600px) {
            .column {
                width: 100%;
                display: block;
                margin-bottom: 10px;
            }
        }

        /* Style the counter cards */
        .cardB {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            padding: 16px;
            text-align: center;
            background-color: #444;
            color: white;
        }

        .fa {font-size:70px;}
        
        /* The Toggle */

        .switch {
            position: relative;
            display: inline-block;
            width: 90px;
            height: 34px;
        }

        .switch input {display:none;}

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ca2222;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #2ab934;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(55px);
            -ms-transform: translateX(55px);
            transform: translateX(55px);
        }

        /*------ ADDED CSS ---------*/
        .on
        {
            display: none;
        }

        .on, .off
        {
            color: white;
            position: absolute;
            transform: translate(-50%,-50%);
            top: 50%;
            left: 50%;
            font-size: 10px;
            font-family: Verdana, sans-serif;
        }

        input:checked+ .slider .on
        {display: block;}

        input:checked + .slider .off
        {display: none;}

        /*--------- END --------*/

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;}
    </style>
</head>
<body>
<?php include "navbar.php"; ?>
<form method="post" enctype="multipart/form-data" id="textform">
     <div class="rowB">
        <div class="column">
            <div class="cardB">
                <p><i class="fa fa-lightbulb-o"></i></p>
                <p>Light</p>
                <label class="switch"><input type="checkbox" id="checkboxLight"><div class="slider round"><span class="on">ON</span><span class="off">OFF</span><!--END--></div></label>
                
            </div>
        </div>

        <div class="column">
            <div class="cardB">
                <p><i class="fa fa-tint"></i></p>
                <p>Water Pump</p>
                <label class="switch"><input type="checkbox" id="togBtn"><div class="slider round"><!--ADDED HTML --><span class="on">ON</span><span class="off">OFF</span><!--END--></div></label>
                
            </div>
        </div>
    </div>
</form>

</body>
</html>
