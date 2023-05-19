<?php

include 'includes/autoload.inc.php';

$company = new Company();
$product = new Products();

$found = $company->retrieveCompanyDetails();    

if($found){
    $companyName = $company->getCompanyName();

    if(isset($_POST['update'])){
        $productID = $_POST['productID'];
        $productCode = $_POST['productCode'];
        $productName = $_POST['productName'];
        $manufacturer = $_POST['manufacturer'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category = $_POST['category'];
        if(isset($_FILES['image'])){
            $tmp_name = $_FILES['image']['tmp_name'];
            if($tmp_name!=""){
                $image = file_get_contents($tmp_name, 'rb');
            }else{
                $image="";
            }
        }
        if($productID==""){
            $product->createProduct($productCode, $productName, $manufacturer, $description, 
            $price, $category, $image);
        } else {
            $product->upDateProduct($productID, $productCode, $productName, $manufacturer, $description, 
                            $price, $category, $image);
        }
        header('Location: admin-products.php');
    }else {
        if(isset($_GET['mode'])){
            $mode = $_GET['mode'];
            if($mode=="edit"){
                if(isset($_GET['productid'])){
                    $productID = $_GET['productid'];
                }else {
                    $productID = "";
                };
                $foundProduct = $product->getProduct($productID);
                if($foundProduct){
                    $productCode = $product->getProductCode();
                    $productName = $product->getProductName();
                    $manufacturer = $product->getManufacturer();
                    $description = $product->getProductDesc();
                    $price = $product->getPrice();
                    $category = $product->getCategory();
                    $image = $product->getImage();  
                } 
            }else {
                $productID = "";
                $productCode = "";
                $productName = "";
                $manufacturer = "";
                $description = "";
                $price = "";
                $category = "";
                $image=""; 
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
            <h1 class="admin-header">Add/Edit Product</h1>
            <section class="forms">
                <div class="data-form">
                    <form class="form" method="POST" action="admin-product-edit.php" name="edit" enctype="multipart/form-data">
                        <input class="input" type="hidden" name="productID" id="productID" value="<?= $productID ?>">
                        <label class="label" for="productCode">Product Code</label>
                        <input class="input" type="text" name="productCode" id="productCode" value="<?= $productCode ?>" required autofocus>
                        <label class="label" for="productName">Product Name</label>
                        <input class="input" type="text" name="productName" id="productName" value="<?= $productName ?>" required>
                        <label class="label" for="manufacturer">Manufacturer</label>
                        <input class="input" type="text" name="manufacturer" id="manufacturer" value="<?= $manufacturer ?>" required>
                        <label class="label" for="description">Description</label>
                        <textarea class="input" name="description" id="description"><?= $description ?></textarea>
                        <label class="label" for="Price">Price</label>
                        <input class="input" type="text" name="price" id="price" value="<?= $price ?>" required> 
                        <label class="label" for="category">Category</label>
                        <select class="input" name="category" id="category">
                            <option value="Accessories" <?= $category == 'Accessories' ? ' selected="selected"' : '';?>>Accessories</option>
                            <option value="Clothing" <?= $category == 'Clothing' ? ' selected="selected"' : '';?>>Clothing</option>
                            <option value="Bike" <?= $category == 'Bike' ? ' selected="selected"' : '';?>>Bike</option>
                        </select>
                        <label class="label" for="image">Image</label>
                        <input class="input" type="file" name="image" id="image" accept="image/jpeg, image/png, image/webp">
                        <div class="admin-image">
                        <?php 
                            echo '<img id="showImage" src="data:image/jpeg;base64,' . base64_encode($image) . '" alt=""/>';
                        ?>
                        </div>
                        <input class="button" type="submit" name="update" id="update" value="Update">                        
                    </form>
                </div>
            </section>
            <script>
                const change = document.getElementById('image');
                const preview = document.getElementById('showImage');

                change.addEventListener('change',function(){
                    const reader = new FileReader();
                    const file = document.querySelector('input[type=file]').files[0];

                    reader.addEventListener("load", function () {
                        // convert image file to base64 string
                        preview.src = reader.result;
                    }, false);
                    
                    if(file){
                        reader.readAsDataURL(file);
                    }
                }); 
            </script>            
        </main>
    </body>
</html>