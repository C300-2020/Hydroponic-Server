<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
        <link href="link/bootstrap.min.css" rel="stylesheet"></link>
        <script src="link/jquery-3.4.1.min.js"></script> 
        <script src="link/bootstrap.min.js"></script> 
        <style>
            .row{
                grid-gap: 50px;
                padding: 50px;
            }



            .card-img-top {
                display: block;
                width: 100%;
                height: auto;
            }

            .overlay {
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

            .card :hover .overlay {
                opacity: 0.65;
            }

            .text {
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

            /* Solid border */
            hr.solid {
                border-top: 3px solid #bbb;
            }
        </style>
        <title></title>
    </head>
    <body>
        <div class="container-fluid bg-3 text-center">
            <hr class="solid">
            <h3 class="margin">Curent Data</h3>
            <hr class="solid">
            <br>
            <div class="row">
                <div class="col mb-6">
                    <div class="card">
                        <div class="container">
                            <a href="lineGraphT.php">
                            <img src="images/A.jpg" class="card-img-top" alt="Card image cap">
                            <div class="overlay">
                                <div class="text">Temp</div>
                            </div>
                            </a>
                        </div>                       
                    </div>
                </div>

                <div class="col mb-6"> 
                    <div class="card">
                        <div class="container">
                            <a href="lineGraphH.php">
                            <img src="images/humid.jpg" class="card-img-top" alt="Card image cap">
                            <div class="overlay">
                                <div class="text">Humidity</div>
                            </div>
                            </a>
                        </div>                       
                    </div>
                </div>

            </div>

           
            <div class="row">
                <div class="col mb-8">
                    <div class="card">
                        <div class="container">
                            <a href="gallery.php">
                                <img src="images/gallery.jpg" class="card-img-top" alt="Card image cap">
                                <div class="overlay">
                                    <div class="text">Gallery</div>
                                </div>
                            </a>

                        </div>                       
                    </div> 
                </div>
            </div>



        </div>


    </body>
</html>


