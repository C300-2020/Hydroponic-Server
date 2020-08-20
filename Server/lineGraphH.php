
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
        <style>
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
        </style>
    </head>
    <body>
        <?php
        $dataPoints = array(
            array("x" => -50, "y" => 6.285),
            array("x" => -40, "y" => 4.656),
            array("x" => -30, "y" => 3.530),
            array("x" => -20, "y" => 2.731),
            array("x" => -15, "y" => 2.419),
            array("x" => -10, "y" => 2.151),
            array("x" => -5, "y" => 1.920),
            array("x" => 0, "y" => 1.720),
            array("x" => 5, "y" => 1.546),
            array("x" => 10, "y" => 1.394),
            array("x" => 15, "y" => 1.261),
            array("x" => 20, "y" => 1.144),
            array("x" => 25, "y" => 1.040),
            array("x" => 30, "y" => 0.948),
            array("x" => 40, "y" => 0.794),
            array("x" => 50, "y" => 0.670),
            array("x" => 60, "y" => 0.570),
            array("x" => 70, "y" => 0.487),
            array("x" => 75, "y" => 0.45)
        );
        ?>
        <!DOCTYPE HTML>
    <html>
        <head>
            <link href="link/bootstrap.min.css" rel="stylesheet"></link>
            <script src="link/jquery-3.4.1.min.js"></script> 
            <script src="link/bootstrap.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"></link>
            <script>

                window.onload = function () {

                    var chart = new CanvasJS.Chart("chartContainer", {
                        title: {
                            text: "Humidity"
                        },
                        axisX: {
                            title: "Humidity",
                            suffix: " %"
                        },
                        axisY: {
                            title: "Time (in hours)",
                            suffix: " hrs"
                        },
                        data: [{
                                type: "area",
                                markerSize: 0,
                                xValueFormatString: "#,##0 °C",
                                yValueFormatString: "#,##0.000 mPa·s",
                                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                            }]
                    });
                    chart.render();

                }



            </script>
            
            <script>
            $(document).ready(function () {
                $.ajax({
                    type: "GET",
                    url: "https://hydroponic.myapplicationdev.com/webservices/retrieve_all.php",
                    cache: false,
                    dataType: "JSON",
                    success: function (response) {
                        var arrayData = [];
                        for (i = 0; i < response.length; i++) {
                            arrayData.push(response[i].humidity);                 
                        }
                        createCookie("arrayData", arrayData)
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

        </head>
        <body>
            <div id="myBtnContainer">
                <button class="btn active" onclick="filterSelection('daily')"> Daily</button>
                <button class="btn" onclick="filterSelection('weekly')"> Weekly</button>
                <button class="btn" onclick="filterSelection('monthly')"> Monthly</button>
            </div>


            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>


        </body>
    </html> 
</body>
</html>
<script>
// Add active class to the current button (highlight it)
                    var btnContainer = document.getElementById("myBtnContainer");
                    var btns = btnContainer.getElementsByClassName("btn");
                    for (var i = 0; i < btns.length; i++) {
                        btns[i].addEventListener("click", function () {
                            var current = document.getElementsByClassName("active");
                            current[0].className = current[0].className.replace(" active", "");
                            this.className += " active";
                        });
                    }
</script>
