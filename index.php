<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bike King Borders</title>
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    
</head>
<body>

    <div class="container" id="filter">
    
    <div class = "row">
    <?php
    include('header.php');
    ?>
    </div>

    <div style="padding-right:20px" class = "row ">
    <?php
    include 'includes/history.inc.php';
    ?>
    </div>

    <div style="padding-right:20px" class = "row bike-data">
    <?php
    include 'includes/offers.inc.php';
    ?>
    </div>

    <div class = "row bike-data">
    <?php
     include('bike-slider.php');
    ?>
   
   <div style="padding:20px" class = "row bike-data">
    <?php
     include('accessories-slider.php');
    ?>

    <div style="padding-right:20px" class="row bike-data">
    <?php
    include('clothing-slider.php');
    ?>
    </div>

    <div class = "row">
    <?php
    include('footer.php');
    ?>
    </div>
    </div>
</body>
</html>

