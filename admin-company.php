<?php

include 'includes/autoload.inc.php';

$company = new Company();

if(isset($_POST['submit'])){

    $company->setCompanyName($_POST['companyName']);
    $company->setAddress1($_POST['address1']);
    $company->setAddress2($_POST['address2']);
    $company->setAddress3($_POST['address3']);
    $company->setPostCode($_POST['postCode']);
    $company->setContactNumber($_POST['contactNumber']);
    $company->setEmail($_POST['email']);
    $company->setWeekDayOpen($_POST['weekDayOpen']);
    $company->setWeekDayClose($_POST['weekDayClose']);
    $company->setSaturdayOpen($_POST['saturdayOpen']);
    $company->setSaturdayClose($_POST['saturdayClose']);
    $company->setSundayOpen($_POST['sundayOpen']);
    $company->setSundayClose($_POST['sundayClose']);

    $company->updateCompanyDetails();

    header("Location: admin.php");
}


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
            <section class="forms">
                <div class="data-form">
                    <h1 class="data-form-header">Company Details</h1>
                    <form class="form" method="post" action="admin-company.php" name="company">
                        <label class="label" for="companyName">Company Name</label>
                        <input class="input" type="text" name="companyName" id="companyName" value="<?= $companyName; ?>" autofocus required>
                        <label class="label" for="address1">Address Line 1</label>
                        <input class="input" type="text" name="address1" id="address1" value="<?= $address1 ?>" required>                        
                        <label class="label" for="address2">Address Line 2</label>
                        <input class="input" type="text" name="address2" id="address2" value="<?= $address2 ?>" required> 
                        <label class="label" for="address1">Address Line 1</label>
                        <input class="input" type="text" name="address3" id="address3" value="<?= $address3 ?>" required>
                        <label class="label" for="postCode">Post Code</label>
                        <input class="input" type="text" name="postCode" id="postCode" value="<?= $postCode ?>" required>
                        <label class="label" for="contactNumber">Contact Number</label>
                        <input class="input" type="text" name="contactNumber" id="contactNumber" value="<?= $contactNumber ?>" required>                          
                        <label class="label" for="email">Email Address</label>
                        <input class="input" type="email" name="email" id="email" value="<?= $email ?>" required>  
                        <fieldset class="company-hours">
                            <label class="label" for="weekDayOpen">Mon-Fri</label>
                            <input class="input centre" type="text" name="weekDayOpen" id="weekDayOpen" value="<?= $weekDayOpen ?>" required>  
                            <label class="label centre" for="weekDayClose"> - </label>
                            <input class="input centre" type="text" name="weekDayClose" id="weekDayClose" value="<?= $weekDayClose ?>" required>  
                            <label class="label" for="saturdayOpen">Saturday</label>
                            <input class="input centre" type="text" name="saturdayOpen" id="saturdayOpen" value="<?= $saturdayOpen ?>" required>  
                            <label class="label centre" for="saturdayClose"> - </label>
                            <input class="input centre" type="text" name="saturdayClose" id="saturdayClose" value="<?= $saturdayClose ?>" required> 
                            <label class="label" for="sundayOpen">Sunday</label>
                            <input class="input centre" type="text" name="sundayOpen" id="sundayOpen" value="<?= $sundayOpen ?>" required>  
                            <label class="label centre" for="sundayClose"> - </label>
                            <input class="input centre" type="text" name="sundayClose" id="sundayClose" value="<?= $sundayClose ?>" required> 
                        </fieldset>                
                        <input class="button" type="submit" name="submit" value="Save">                        
                    </form>
                </div>
            </section>
        </main>
        <script src="js/main.js"></script>
    </body>
</html>




