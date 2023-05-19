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
    
</head>
<body>
    <div class="container">
    <div class = "row">
    <?php
    include('header.php');
    ?>
    </div>
    <div class = "row">
    <div>
    <h2 class="basket-header">Shopping Basket<br></h2>
    </dov>

<?php 
$basketItem = new Basketitems();

$total = 0;

  if(isset($_GET['productID'])){
      $productID = $_GET['productID'];
        if(!isset($_GET['action'])){
          $basketItem->createNewBasketItem($productID, 1);
            }else if(isset($_GET['action'])){
                    if($_GET['action']=="del"){
                    $basketItem->deleteBasketItem($productID);
                      }

                        }

                          }


$rows = $basketItem->listBasket();
$record = 0;
while($record < count($rows)){
?>

<div class=" col-md-3 thumbnail" >
				<?php echo '<img  class="listImage" id="productItem" src="data:image/jpeg;base64,' .

        base64_encode($rows[$record]['image']) .'"/>';?>

        <?php echo '<p style="color:black" class="productCode">Code - '.$rows[$record]['productCode'].'</p>';?>
				<?php echo ' <p style="color:black" class="productName">'.$rows[$record]['productName'].'</p>';?>
				<?php echo ' <p style="color:black" class="productPrice">£ '.$rows[$record]['price'].'</p>';?>
        <?php echo ' <p style="color:black" class="productQuantity">Qty - '.$rows[$record]['quantity'].'</p>';?>
        <?php echo ' <p class="basketItem-delete"><a href="basket.php?productID='.$rows[$record]['productID'].
        '&action=del"><i class="fas fa-trash-alt"></i></a></p>';?>

							
		</div>

 <?php

$total = $total + ($rows[$record]['price'] * $rows[$record]['quantity']);

$record++;

}

?>

<div class="col-md-12 thumbnail">
<h3>Total</h3>
<h3>£ <?=number_format($total, 2, ".", ",");?></h3>
<br>
<br>
<button style="background-color:chocolate; border:chocolate; padding-left:30px; padding-right:30px;" type="submit" class="btn btn-primary">Proceed to Payment</button>
<br>
<br>
</div>
    </div>

    <div class = "row">
    <?php
    include('footer.php');
    ?>
    </div>
    </div>
</body>
</html>
