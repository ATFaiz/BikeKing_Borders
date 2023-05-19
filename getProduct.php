<?php



 include 'includes/autoload.inc.php';

 

$productCode = $_GET["productCode"];

$product = new Products();

$row= $product->getProductDetails($productCode);

 

if($row){

$productID = $product->getProductID();

$productName = $product->getProductName();

$productPrice = $product->getPrice();

$productImage = $product->getImage();

echo $productName.",".$productPrice.",".$productImage.",".$productID;

} else {

echo "Error";

}

 

?>