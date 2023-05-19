<?php

include 'includes/autoload.inc.php';

$company = new Company();

$found = $company->retrieveCompanyDetails();    

if($found){
    $companyName = $company->getCompanyName();
    $offers = new Offers();
    $rows = $offers->listOffers();
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
            <h1 class="admin-header">Offer Information</h1>
            <button id="add-offer" type="button" class="button admin">Add Offer</button>
            <table id="table">
                <thead>
                    <tr>
                        <th>Offer ID</th>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>Standard Price</th>
                        <th>Image</th>
                        <th>Sales Price</th>
                        <th style="width: 7%;">Delete</th>
                        <th style="width: 7%;">Amend</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    while($record < count($rows)){
                        echo '<tr>';
                        echo '  <td>'.$rows[$record]['offerID'].'</td>';
                        echo '  <td>'.$rows[$record]['productCode'].'</td>';
                        echo '  <td>'.$rows[$record]['productName'].'</td>';
                        echo '  <td>'.$rows[$record]['price'].'</td>';
                        echo '  <td class="listData"><img class="listImage" id="productItem" src="data:image/jpeg;base64,' . base64_encode($rows[$record]['image']) . '" alt=""/></td>';
                        echo '  <td>'.$rows[$record]['sprice'].'</td>';
                        echo '  <td style="text-align: center;" class="offer-delete"><i class="fas fa-trash-alt"></i></td>';
                        echo '  <td style="text-align: center;" class="offer-amend"><i class="fas fa-edit"></i></td>';
                        echo '</tr>';
                        $record++;
                    }
                ?>
                </tbody>
            </table>
            <button id="exit-offers" type="button" class="button admin">Return to Menu</button>
        </main>
        <script>
            const table = document.getElementById('table');
            const menu = document.getElementById('exit-offers');
            const addOffer = document.getElementById('add-offer');

            addOffer.addEventListener("click", function(){
                window.location.href="admin-offer-edit.php?&mode=add";
            });
            
            menu.addEventListener("click", function(){
                window.location.href="admin.php";
            });
            
            const deleteOffer = document.getElementsByClassName('offer-delete');
            Array.from(deleteOffer).forEach(function (element, index){
                element.addEventListener("click", function(){
                    offerID = table.rows[index+1].cells[0].innerHTML;
                    productName = table.rows[index+1].cells[2].innerHTML;
                    if(window.confirm("Delete Offer - " + offerID + " " + productName + " ?")){
                        window.location.href="admin-offer-del.php?offerid=" + offerID;
                    }
                });
            });

            const editOffer = document.getElementsByClassName('offer-amend');
            Array.from(editOffer).forEach(function (element, index){
                element.addEventListener("click", function(){
                    offerID = table.rows[index+1].cells[0].innerHTML;
                    window.location.href='admin-offer-edit.php?offerid=' + offerID + '&mode=edit';
                });
            });
        </script>
    </body>
</html>