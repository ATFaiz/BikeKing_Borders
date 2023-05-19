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
    <div class="container ">
    <div class = "row">
    <?php
    include('header.php');
    ?>
    </div>
    <div class = "row">
    <?php
    if(isset($_GET['productCode'])){

        $productCode = $_GET['productCode'];
        
        $product = new Products();
        
        $product->retrieveOneProduct($productCode);
        
        $productID = $product->getProductID();
        
        $productCode = $product->getProductCode();
        
        $productName = $product->getProductName();
        
        $manufacturer = $product->getManufacturer();
        
        $productDesc = $product->getProductDesc();
        
        $price = $product->getPrice();
        
        $category = $product->getCategory();
        
        $image = $product->getImage();
        
        };
        
         ?>
    <div class="col-md-6 float-md-left " >
    <?php  echo ' <img class="productImg" id="productItem" src="data:image/jpeg;base64,' .
    base64_encode($image) . '"width="450" hight:"500" alt=""/>';?>
     
    </div>
    <div class="col-md-6 float-md-left" >
    <br>
    <br>
    <br>
    <?php
    echo ' <h3><b>' .$productName.'</b></h3>';
    echo '<h5>'.$productCode.'</h5>';
    echo '<h3><b>£'.$price.'</b></h3>';
    echo '<h4>Manufacturer:<b>'.$manufacturer.'</b></h4>';
    echo '<h4>'.$productDesc.'</h4> <br>';
    echo ' <button style="color:balck; background-color: chocolate; border: chocolate;padding-left: 30px;
     padding-right: 30px;" name:"button" class="btn  button"
      type="button"><b>ADD TO BASKET</b></button>';

    ?>
    
    </div>
    </div>
    
    <div class = "row">
    <?php  include 'includes/relatedproducts.inc.php';?>
    </div>

    <div class = "row">
    <?php
    include('footer.php');
    ?>
    </div>
    </div>


    <script src=js/zoom.js></script>

    <script>
    const buyButton = document.querySelector(".button");
    buyButton.addEventListener("click", function(){
    <?php
        echo '      window.location.href = "basket.php?productID='.$productID.'";';

        echo '   });';
        ?>
    </script>


</body>
</html>
