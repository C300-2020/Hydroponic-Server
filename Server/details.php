<?php
include 'retrieve_all.php';


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
        <link href="link/bootstrap.min.css" rel="stylesheet"/>
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
                    
                       $("#plantName").html(response['plant_name']);
                    },
                    error: function (obj, textStatus, errorThrown) {
                        console.log("Error " + textStatus + ": " + errorThrown);
                    }
                });
                
               
            });
        </script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            /* Style the container with a rounded border, grey background and some padding and margin */
            .containertag {
                border: 2px solid #ccc;
                background-color: #eee;
                border-radius: 5px;
                padding: 16px;
                margin: 16px 0;
            }

            /* Clear floats after containers */
            .containertag::after {
                content: "";
                clear: both;
                display: table;
            }

            /* Float images inside the container to the left. Add a right margin, and style the image as a circle */
            .containertag img {
                float: left;
                margin-right: 20px;
                border-radius: 50%;
            }

            /* Increase the font-size of a span element */
            .containertag span {
                font-size: 20px;
                margin-right: 15px;
            }

            /* Add media queries for responsiveness. This will center both the text and the image inside the container */
            @media (max-width: 500px) {
                .containertag {
                    text-align: center;
                }

                .containertag img {
                    margin: auto;
                    float: none;
                    display: block;
                }
            }
        </style>
    </head>
    <body>
        <?php include "navbar.php"; ?>
        <div class="containertag">
        <p></p>
            <img src="images/A.jpg" alt="Avatar" style="width:90px">
             <p id="plantName">Herbs</p><p>2020/05/05</p>
            <p>In general use, herbs are plants with savory or aromatic properties that are used for flavoring and garnishing food, for medicinal purposes, or for fragrances; excluding vegetables and other plants consumed for macronutrients. Culinary use typically distinguishes herbs from spices. Herbs generally refers to the leafy green or flowering parts of a plant (either fresh or dried), while spices are usually dried and produced from other parts of the plant, including seeds, bark, roots and fruits.</p>
        </div>                   

        <?php include "Summary.php"; ?>




    </body>
</html>
