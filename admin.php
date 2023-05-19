<?php

include 'includes/autoload.inc.php';

$company = new Company();

$found = $company->retrieveCompanyDetails();    

if($found){
    $companyName = $company->getCompanyName();  
}
else
{
    echo "Company Record missing.";
}
?>

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
.btn {
  background-color: DodgerBlue;
  border: none;
 
  padding: 12px 16px;
  font-size: 16px;
  cursor: pointer;
  font-weight:bold;
  color: white;
}
</style>    
</head>
<body>
    

<div style="padding-right:105px" class="container col-md-8 thumbnail  text-center"><h2 style="margin-left:80px; " ><b>Administraion<b> </h2>
<div style="margin-left:45px; "  class="row jumbotron col-md-12  text-center ">
  <div class="col-md-6  " >
    <div class="thumbnail ">
    <a href="admin-company.php" role="button">
      <img style="margin-top:20px;"width="150" hight="100" src="./images/compay-details.png" alt="...">
      <div class="caption">
        <h3>Company Details</h3> 
    </a>
      </div>
    </div>
  </div>

  <div class="col-md-6  " >
    <div class="thumbnail ">
    <a href="admin-users.php" role="button">
      <img style="margin-top:20px;"width="150" hight="100" src="./images/user.png" alt="...">
      <div class="caption">
        <h3>User Information</h3> 
    </a>
      </div>
    </div>
  </div>

  <div class="col-md-6  " >
    <div class="thumbnail ">
    <a href="admin-products.php" role="button">
      <img style="margin-top:20px;"width="150" hight="100" src="./images/product.png" alt="...">
      <div class="caption">
        <h3>product Details</h3> 
    </a>
      </div>
    </div>
  </div>

  <div class="col-md-6  " >
    <div class="thumbnail ">
    <a href="admin-offers.php" role="button">
      <img style="margin-top:20px;"width="150" hight="100" src="./images/offer.png" alt="...">
      <div class="caption">
        <h3>Offers</h3> 
    </a>
      </div>
    </div>
  </div>
<div>
<a class="btn" href="index.php" role="button">Exit Administraion</a>
  <!-- <button class="btn"><i class="fa fa-close"></i>  <a href="index.php"></a> </button> -->
</div>
</div>
</div>
</body>
</html>