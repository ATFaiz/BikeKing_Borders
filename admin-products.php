<?php

include 'includes/autoload.inc.php';

$company = new Company();

$found = $company->retrieveCompanyDetails();    

if($found){
    $companyName = $company->getCompanyName();
    $product = new Products();
    $rows=$product->listProducts();
    $record = 0;
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
            <h1 class="admin-header">Product Information</h1>
            <button id="add-product" type="button" class="button admin">Add Product</button>
            <table id="table">
                <thead>
                    <tr>
                        <th style="width: 10%;">Product ID</th>
                        <th style="width: 10%;">Product Code</th>
                        <th style="width: 10%;">Name</td>
                        <th style="width: 12%;">Manufacturer</th>
                        <th style="width: 15%;">Description</th>
                        <th style="width: 10%;">Price</th>
                        <th style="width: 10%;">Category</th>
                        <th>Image</th>
                        <th style="width: 7%;">Delete</th>
                        <th style="width: 7%;">Amend</th>
                    </tr>
                </thead>
                <tbody>               
                <?php
                    while($record < count($rows)){
                        echo '<tr>';
                        echo '  <td>'.$rows[$record]['productID'].'</td>';
                        echo '  <td>'.$rows[$record]['productCode'].'</td>';
                        echo '  <td>'.$rows[$record]['productName'].'</td>';
                        echo '  <td>'.$rows[$record]['manufacturer'].'</td>';
                        echo '  <td>'.$rows[$record]['productDescription'].'</td>';
                        echo '  <td>£ '.$rows[$record]['price'].'</td>';
                        echo '  <td>'.$rows[$record]['category'].'</td>';
                        echo '  <td class="listData"><img class="listImage" id="productItem" src="data:image/jpeg;base64,' . base64_encode($rows[$record]['image']) . '" alt=""/></td>';
                        echo '  <td style="text-align: center;" class="product-delete"><i class="fas fa-trash-alt"></i></td>';
                        echo '  <td style="text-align: center;" class="product-amend"><i class="fas fa-edit"></i></td>';
                        echo '</tr>';
                        $record++;
                    }
                ?>
                </tbody>
            </table>
            <button id="exit-users" type="button" class="button admin">Return to Menu</button>
        </main>
        <script>
            const table = document.getElementById('table');
            const menu = document.getElementById('exit-users');
            const addProduct = document.getElementById('add-product');

            addProduct.addEventListener("click", function(){
                window.location.href="admin-product-edit.php?&mode=add";
            });

            menu.addEventListener("click", function(){
                window.location.href="admin.php";
            });
            
            const deleteProduct = document.getElementsByClassName('product-delete');
            Array.from(deleteProduct).forEach(function (element, index){
                element.addEventListener("click", function(){
                    productID = table.rows[index+1].cells[0].innerHTML;
                    productName = table.rows[index+1].cells[2].innerHTML;
                    if(window.confirm("Delete Product - " + productName + " ?")){
                        window.location.href="admin-product-del.php?productid=" + productID;
                    }
                });
            });

            const editProduct = document.getElementsByClassName('product-amend');
            Array.from(editProduct).forEach(function (element, index){
                element.addEventListener("click", function(){
                    productID = table.rows[index+1].cells[0].innerHTML;
                    window.location.href='admin-product-edit.php?productid=' + productID + '&mode=edit';
                });
            });
        </script>
    </body>
</html>