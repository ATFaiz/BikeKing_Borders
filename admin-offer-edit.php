<?php

include 'includes/autoload.inc.php';

$company = new Company();
$offer = new Offers();

$found = $company->retrieveCompanyDetails();    

if($found){
    $companyName = $company->getCompanyName();

    if(isset($_POST['update'])){
        $offerID = $_POST['offerID'];
        $productID = $_POST['productID'];
        $price = $_POST['sprice'];
        if($offerID==""){
            $offer->createOffer($productID, $price);
        } else {
            $offer->upDateOffer($offerID, $productID, $price);
        }
        header('Location: admin-offers.php');
    }else {

        if(isset($_GET['mode'])){
            $mode = $_GET['mode'];
            if($mode=="edit"){
                if(isset($_GET['offerid'])){
                    $offerID = $_GET['offerid'];
                };
                $foundOffer = $offer->getOffer($offerID);
                if($foundOffer){
                    $offerID = $offer->getOfferID();
                    $productID = $offer->getProductID();
                    $sprice = $offer->getPrice();
                    $product = new Products();
                    $foundProduct = $product->getProduct($productID);
                    if($foundProduct){
                        $productCode = $product->getProductCode();
                        $productName = $product->getProductName();
                        $price = $product->getPrice();
                        $image = $product->getImage();
                    }
                } 
            } else {
                $offerID = "";
                $productID = "";
                $sprice = "";
                $productCode = "";
                $productName = "";
                $price = "";
                $image = "";
            }
        }
    }
}
else
{
    echo "Company Record missing.";
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Admin</title>
        <meta name="author" content="Ahmad Tariq Faiz">
        <meta name="description" content="Data Administration Pages">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Roboto&display=swap" rel="stylesheet"> 
        <script src="https://kit.fontawesome.com/3830352c3e.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <main>
            <h1 class="wordmark center"><?= $companyName ?></h1>
            <h1 class="admin-header">Database Administration</h1>
            <h1 class="admin-header">Add/Edit Offer</h1>
            <section class="forms">
                <div class="data-form">
                    <form class="form" method="POST" action="admin-offer-edit.php" name="edit">
                        <input class="input" type="hidden" name="offerID" id="offerID" value="<?= $offerID ?>">
                        <input class="input" type="hidden" name="productID" id="productID" value="<?= $productID ?>">
                        <label class="label" for="productCode">Product Code</label>
                        <input onchange="retrieveProduct()" class="input" type="text" name="productCode" id="productCode" value="<?= $productCode ?>" <?php if($mode == "edit") { echo 'disabled';} ?>>
                        <p class="warning">Error :- Record not found.</p>
                        <label class="label" for="productName">Product Name</label>
                        <input class="input" type="text" name="productName" id="productName" value="<?= $productName ?>" disabled>
                        <label class="label" for="Price">Price</label>
                        <input class="input" type="text" name="price" id="price" value="<?= $price ?>" disabled>
                        <div class="admin-image">
                        <?php 
                            echo '<img id="showImage" src="data:image/jpeg;base64,' . base64_encode($image) . '" alt=""/>';
                        ?>
                        </div>
                        <label class="label" for="Price">Sales Price</label>
                        <input class="input" type="text" name="sprice" id="sprice" value="<?= $sprice ?>" required>                         
                        <input class="button" type="submit" name="update" id="update" value="Update">                        
                    </form>
                </div>
            </section>
            <script>
                function retrieveProduct(){
                    const productCode = document.getElementById('productCode').value;
                    const image = document.getElementById('showImage');

                    let url = "getProduct.php?productCode=" + productCode;

                    let xhr = new XMLHttpRequest();
                    xhr.open("GET", url);
                    xhr.responseType = "text";
                    xhr.send();
                    xhr.onload = function() {
                        if (xhr.status != 200) { // analyze HTTP status of the response
                            alert(`Error ${xhr.status}: ${xhr.statusText}`); // e.g. 404: Not Found
                        }
                        else {
                            var data = xhr.response.split(',');
                            if(data !="Error"){
                                document.getElementById('productName').value = data[0];
                                document.getElementById('price').value = data[1];
                                image.src = "data:image/jpeg;base64," + data[2];
                                document.getElementById('productID').value = data[3];
                                document.querySelector('.warning').style.display = "none";
                                document.getElementById('update').disabled = false;
                            }else {
                                document.getElementById('productName').value = "";
                                document.getElementById('price').value = "";
                                image.src = "";
                                document.querySelector('.warning').style.display = "block";
                                document.getElementById('update').disabled = true;
                            }
                        }
                    };

                    xhr.onerror = function() {
                        alert("Request failed");
                    };
                }
            </script>            
        </main>
    </body>
</html>