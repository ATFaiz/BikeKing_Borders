<?php

include 'includes/autoload.inc.php';

$company = new Company();

$found = $company->retrieveCompanyDetails();

if($found){

$companyName = $company->getCompanyName();

$address1 = $company->getAddress1();

$address2 = $company->getAddress2();

$address3 = $company->getAddress3();

$postCode = $company->getPostCode();

$email = $company->getEmail();

$contactNumber = $company->getContactNumber();

$postCode = $company->getPostCode();

$contactNumber = $company->getContactNumber();

$email = $company->getEmail();

$weekDayOpen = $company->getWeekDayOpen();

$weekDayClose = $company->getWeekDayClose();

$saturdayOpen = $company->getSaturdayOpen();

$saturdayClose = $company->getSaturdayClose();

$sundayOpen = $company->getSundayOpen();

$sundayClose = $company->getSundayClose();         

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
        <meta name="description" content="Simple Responsive Navigation">
        <meta name="viewport" content="width=device-width, initial-size=1.0">
        <link rel="stylesheet" href="css/style_nav.css">
        <script src="https://kit.fontawesome.com/3830352c3e.js" crossorigin="anonymous"></script>   
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <style>
            @media screen and (min-width: 601px) {
            .h-li {
                font-size: 18px;
                color:black;
            }
                    }

            /* If the screen size is 600px wide or less, set the font-size of <div> to 30px */
            @media screen and (max-width: 600px) {
            .h-li{
                font-size: 12px;
                color:black;
            }
                    }
        </style>
    <script>
        $(document).ready(function(){
        $("#search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#filter .bike-data").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        });
</script> 
    </head>
    <body>
        <header>
            <div class="banner">
                <i class="fas fa-bars"></i>
                     
                <img class ="banner-image" src="./nav-images/banner4.jpg" alt="web banner"  >
                
                
            </div>
            <nav class="header-nav">
                <ul class="header-ul">
                    <li><a class="h-li" href="index.php">Home</a></li>
                    <li><a class="h-li"href="bike.php">Bike</a></li>
                    <li><a class="h-li" href="repairs.php">Services</a></li>
                    <li ><a class="h-li" href="clothing.php">Clothing</a></li>
                    <li ><a class="h-li"  href="accessories.php">Accessories</a></li>
                    <li ><a class="h-li" href="bike-trails.php">Bike Trail</a></li>
                    <li ><a class="h-li" href="sign-up.php">Registration</a></li>
                   <?php
                   session_start();
                   if(isset($_SESSION['User_ID']))
                        {
                           
                            echo '<li ><a class="fas fa-user h-li" href="logout.php"> Logout</a></li>'; 
                            // echo 'header("Location:index.php")';
                           
                        }
                        else{
                          echo  '<li ><a class="fas fa-user h-li" href="login.php"> Login</a></li>';
                        }
                    ?>
                    <li>
                    <form method="post" action="search.php">
                      <input type="text" name="search" id="search" placeholder="Search..">
                      <button class="search-submit" type="submit"></button></button>
                    </form>
                    </li>
                </ul>
            </nav>
        </header>
        
           <script src="js/main_nav.js"></script>
    </body>
</html>