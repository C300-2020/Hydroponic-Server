

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <script>
            $(document).ready(function () {
                $.ajax({
                    type: "GET",
                    url: "https://hydroponic.myapplicationdev.com/webservices/back-end/retrieve_all.php",
                    cache: false,
                    dataType: "JSON",
                    success: function (response) {
                        var arrayImages = [];
                        
                        for (i = 0; i < response.length; i++) {
                            arrayImages.push(response[i].image);
                            
                        }
                        createCookie("arrayImages", arrayImages);
                    
                    },
                    error: function (obj, textStatus, errorThrown) {
                        console.log("Error " + textStatus + ": " + errorThrown);
                    }
                });
                
                function createCookie(name, value) {
                    var expires = "";

                    document.cookie = escape(name) + "=" +
                            escape(value) + expires + "; path=/";
                }
            });
        </script>
        <?php
            $array = $_COOKIE["arrayImages"];
            $length = count($array);
            $timesToLoop = 0;
            if($length < 3){
            $timesToLoop = $length;
            }
            if ($length % 3 == 0){
                $timeToLoop = $length / 3;    
            } else {
                $timeToLoop = $lenth / 3;
                $timeToLoop = $timeToLoop + 1;   
            }
            
        ?>
   
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color: #f1f1f1;
            padding: 20px;
            font-family: Arial;
        }

        /* Center website */
        .main {
            max-width: 1000px;
            margin: auto;
        }

        h1 {
            font-size: 50px;
            word-break: break-all;
        }

        .row {
            margin: 8px -16px;
        }

        /* Add padding BETWEEN each column (if you want) */
        .row,
        .row > .column {
            padding: 8px;
        }

        /* Create three equal columns that floats next to each other */
        .column {
            float: left;
            width: 33.33%;
            display: none; /* Hide columns by default */
        }

        /* Clear floats after rows */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Content */
        .content {
            background-color: white;
            padding: 10px;
        }

        /* The "show" class is added to the filtered elements */
        .show {
            display: block;
        }

        /* Style the buttons */
        .btn {
            border: none;
            outline: none;
            padding: 12px 16px;
            background-color: white;
            cursor: pointer;
        }

        /* Add a grey background color on mouse-over */
        .btn:hover {
            background-color: #ddd;
        }

        /* Add a dark background color to the active button */
        .btn.active {
            background-color: #666;
            color: white;
        }
    </style>
    <body>
        <h2>Gallery</h2>
        <div id="btnContainer">
            <button class="btn active" onclick="filterSelection('all')"> Show all</button>
            <button class="btn" onclick="filterSelection('daily')"> Daily</button>
            <button class="btn" onclick="filterSelection('weekly')"> Weekly</button>
            <button class="btn" onclick="filterSelection('monthly')"> Monthly</button>
        </div>

        <!-- Portfolio Gallery Grid -->
        <div class="row">
            <div class="column daily">
                <div class="content">
                    <img src="images/A.jpg" alt="babla" style="width:100%">                    
                </div>
            </div>
            <div class="column daily">
                <div class="content">
                    <img src="images/A.jpg" alt="Lights" style="width:100%">                    
                </div>
            </div>
            <div class="column weekly">
                <div class="content">
                    <img src="images/A.jpg" alt="blabla" style="width:100%">                    
                </div>
            </div>

            <div class="column weekly">
                <div class="content">
                    <img src="images/A.jpg" alt="Car" style="width:100%">                    
                </div>
            </div>
            <div class="column monthly">
                <div class="content">
                    <img src="images/A.jpg" alt="Car" style="width:100%">                    
                </div>
            </div>
            <div class="column monthly">
                <div class="content">
                    <img src="images/A.jpg" alt="Car" style="width:100%">                    
                </div>
            </div>

            <div class="column monthly">
                <div class="content">
                    <img src="images/A.jpg" alt="People" style="width:100%">                    
                </div>
            </div>
            <div class="column people">
                <div class="content">
                    <img src="images/A.jpg" alt="People" style="width:100%">                    
                </div>
            </div>
            <div class="column people">
                <div class="content">
                    <img src="images/A.jpg" alt="People" style="width:100%">                    
                </div>
            </div>
            <!-- END GRID -->
        </div>

        <script>
            
            filterSelection("all") // Show every img
            function filterSelection(cls) {
                var imgArray, i;
                //get every img ele and put in array 
                imgArray = document.getElementsByClassName("column");
                if (cls == "all")
                    cls = "";                 
                for (i = 0; i < imgArray.length; i++) {
                    //Remove the class "show" for Every elements 
                    remove(imgArray[i], "show");
                    //get all the class name to check if the class "daily/weekly/monthly"  exist
                    if (imgArray[i].className.indexOf(cls) > -1)
                        //Add the class "show" for filtered elements  
                        add(imgArray[i], "show");
                }
            }

            function add(element, name) {
                var i, arrClsName, arr2;
                // to have a list of class name
                arrClsName = element.className.split(" ");
                //to put into list
                arr2 = name.split(" ");
                for (i = 0; i < arr2.length; i++) {
                    //to check if exist
                    if (arrClsName.indexOf(arr2[i]) == -1) { // it doesn't exist
                        //combine
                        element.className += " " + arr2[i];
                    }
                }
            }

            function remove(element, name) {
                var i, arrClsName, arr2;
                arrClsName = element.className.split(" ");
                arr2 = name.split(" ");
                for (i = 0; i < arr2.length; i++) {
                    while (arrClsName.indexOf(arr2[i]) > -1) {
                        arrClsName.splice(arrClsName.indexOf(arr2[i]), 1);
                    }
                }
                element.className = arrClsName.join(" ");
            }          

            var btnContainer = document.getElementById("btnContainer");
            var btns = btnContainer.getElementsByClassName("btn");
            for (var i = 0; i < btns.length; i++) {
                btns[i].addEventListener("click", function () {
                    var current = document.getElementsByClassName("active");
                    current[0].className = current[0].className.replace(" active", "");
                    this.className += " active";
                });
            }
        </script>
    </body>
</html>
