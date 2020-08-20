<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link href="link/bootstrap.min.css" rel="stylesheet">
        <script src="link/jquery-3.4.1.min.js"></script> 
        <script src="link/bootstrap.min.js"></script> 
        
        <script>
            $(document).ready(function () {
                $.ajax({
                    type: "GET",
                    url: "https://hydroponic.myapplicationdev.com/webservices/back-end/retrieve_all.php",
                    cache: false,
                    dataType: "JSON",
                    success: function (response) {
                        var arrayImages = [];
                        var arrayDesc = [];
                        for (i = 0; i < response.length; i++) {
                            arrayImages.push(response[i].image);
                            arrayDesc.push(response[i].description);
                        }
                        createCookie("arrayImages", arrayImages);
                        createCookie("arrayDesc", arrayDesc);
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
            $arrayDesc = $_COOKIE["arrayDesc"];
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
        <title>FYP</title>
        
        <style>
            #cardView{
                width: 18rem;
            }
            
            .card-img {
                display: block;
                width: 100%;
                height: auto;
            }

            .card-img-overlay {
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                height: auto;
                width: 100%;
                opacity: 0;
                transition: .5s ease;
                background-color: #000000;
            }

            .card :hover .card-img-overlay {
                opacity: 0.65;
                
            }

            .card-text {
                color: white;
                font-size: 20px;
                position: absolute;
                top: 50%;
                left: 50%;
                -webkit-transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
                text-align: center;
            }
        </style>
        
    </head>
    <body>
        <?php include "navbar.php"; echo $array ?>
                    <?php 
                    if($timeToLoop < 4){
                        for($i = 0; $i < $timeToLoop; $i++){   ?>
                            
                            <div class="row">
                            <div class="col-md-4">
                            <div class="card" id="cardView">
                            <div class="container">
                                    <a href="details.php">
                                      <img class="card-img" id="cardImg" src="plantImg/default.jpg" alt="Card image">                                       
                                      <div class="card-img-overlay">
                                          <p class="card-text" id="cardText"><?php $arrayDesc[$count] ?></p>
                                      </div>
                                      </a>
                                  </div>
                            </div>            
                            </div>
                            </div>
                        <?php    
                        }
                    } else {
                        $count = 0;
                        for($i = 0; $i < $timeToLoop; $i++){ ?>
                        
                            <div class="row">
                        
                            <?php
                            for($x = 0; $x < 3; $x++){
                                if($array[$count] == null){ ?>
                                    <div class="col-md-4">
                                       <div class="card" id="cardView">
                                       <div class="container">
                                            <a href="details.php">
                                                <img class="card-img" id="cardImg" src="plantImg/default.jpg" alt="Card image">
                                                <div class="card-img-overlay">
                                                    <p class="card-text" id="cardText">Empty Now!</p>
                                                </div>
                                                </a>
                                            </div>
                                            </div>            
                                    </div>
                                
                                <?php                
                                } else {
                                    ?>
                                    
                                    <div class="col-md-4">
                                       <div class="card" id="cardView">
                                       <div class="container">
                                            <a href="details.php">
                                                <img class="card-img" id="cardImg" src="<?php $array[$count] ?>.jpg" alt="Card image">
                                                <div class="card-img-overlay">
                                                    <p class="card-text" id="cardText"><?php $arrayDesc[$count] ?></p>
                                                </div>
                                                </a>
                                            </div>
                                            </div>            
                                    </div>
                                    
                                    <?php        
                                }
                                $count = $count + 1;
                            }
                            ?>
                            
                            </div>
                            
                            <?php 
                        } 
                    }
                        
                    ?>      
           
    </body>
</html>
