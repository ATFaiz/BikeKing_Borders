<?php
    
    include 'includes/autoload.inc.php';
    
    if(isset($_GET['productid'])){

        $productID = $_GET['productid'];

        $userHistory = new Userhistory();
        $userHistory->deleteProductHistory($productID);

        $product = new Products();
        $product->deleteProduct($productID);

        header('Location: ' . $_SERVER["HTTP_REFERER"] );

    }
?>