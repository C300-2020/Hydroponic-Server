
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

        <!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
        <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

        <!-- Bootstrap Date-Picker Plugin -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
        <style>
            body {font-family: Arial, Helvetica, sans-serif;}
            * {box-sizing: border-box;}

            input[type=text], select, textarea {
                width: 100%;
                padding: 12px;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                margin-top: 6px;
                margin-bottom: 16px;
                resize: vertical;
            }

            input[type=submit] {
                background-color: #4CAF50;
                color: white;
                padding: 12px 20px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            input[type=submit]:hover {
                background-color: #45a049;
            }

            .container {
                border-radius: 5px;
                background-color: #f2f2f2;
                padding: 20px;
            }
        </style>
    </head>
    <body>
        <?php include "navbar.php"; ?>

        <h3>New Plant</h3>



        <div class="bootstrap-iso">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">

                        <!-- Form code begins -->
                        <form method="post">
                            <label for="fname">Plant Name</label>
                            <input type="text" id="name" name="name">
                            <div class="form-group"> <!-- Date input -->
                                <label class="control-label" for="date">Date</label>
                                <input class="form-control" id="date" name="date" placeholder="YYYY/MM/DD" type="text"/>
                            </div>
                            <label for="subject">Description</label>
                            <textarea id="desc" name="desc" placeholder="Descripe it..." style="height:200px"></textarea>
                            <div class="form-group"> <!-- Submit button -->
                                <button onclick="submitForm();" class="btn btn-primary " name="add" type="add">Add</button>
                            </div>
                        </form>
                        <!-- Form code ends --> 

                    </div>

                    </body>
                    </html>

                    <script>
                        $(document).ready(function () {
                            var date_input = $('input[name="date"]'); //our date input has the name "date"
                            var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
                            var options = {
                                format: 'yyyy/mm/dd',
                                container: container,
                                todayHighlight: true,
                                autoclose: true,
                            };
                            date_input.datepicker(options);
                        })
                        
                        
                        function submitForm() {
    $.ajax({
        method: "POST",
        url: "add.php",
        data: JSON.stringify($("form").serializeArray())
    });
  }
                    </script>
