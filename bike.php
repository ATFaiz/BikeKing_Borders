<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bike King Borders</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <style>
   
    .h3{
        height: 80px;
       }
    h3{
       height: 80px;
      }

    </style>
</head>
<body>
    <div class="container">
    <div class = "row">
    <?php
    include('header.php');
    ?>
    </div>
    <div class = "row">
    <div id="filter">
    <?php

$products = new Products();

$category = "bike";

$rows = $products->retrieveCategory($category);

$record = 0;


while($record < count($rows)){ 
?>
    
    
    <div class="col-md-3 float-md-left bike-data">
    <br>
      
       <img  class="img-thumbnail" src="data:image/jpeg;base64, <?php echo base64_encode($rows[$record]['image']); ?>" 
    alt="<?php echo $rows[$record]['productName']; ?>">
    
    <h3><?php echo $rows[$record]['productName'];?></h3>
    
    <button style="background-color: chocolate; border: chocolate;padding-left: 30px; padding-right: 30px; " type="submit" class="btn btn-primary">
   <?php echo' <a style="color:black" href= "productItem.php?productCode=' . $rows[$record]['productCode'] .'"><b>MORE INFO</b></a>';?>
    
    </button>
   
    <br>
    <br>
      </div>
      <?php
  $record++;  // Increment record //

}

  echo ' </div>';
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
