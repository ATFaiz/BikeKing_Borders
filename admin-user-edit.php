<?php

include 'includes/autoload.inc.php';

$company = new Company();
$user = new Users("","","","","","","","","");

$found = $company->retrieveCompanyDetails();    

if($found){
    $companyName = $company->getCompanyName();

    if(isset($_POST['update'])){
        $userID = $_POST['userID'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $houseNumber = $_POST['houseNumber'];
        $street = $_POST['street'];
        $city = $_POST['city'];
        $postCode = $_POST['postCode'];
        if(isset($_POST['subscription'])){
            $subscription = 1;
        }
        else
        {
            $subscription = 0;
        }
        $user->upDateUser($userID, $firstName, $lastName, $houseNumber, $street,
                          $city, $postCode, $subscription);
        header('Location: admin-users.php');
    }else {

        if(isset($_GET['userid'])){
            $userID = $_GET['userid'];
            $foundUser = $user->getUser($userID);
            if($foundUser){
                $firstName = $user->getFirstName();
                $lastName = $user->getLastName();
                $houseNumber = $user->getHouseNumber();
                $street = $user->getStreet();
                $city = $user->getCity();
                $postCode = $user->getPostCode();
                $subscription = $user->getSubscription();
            } else {
                echo 'User not found';
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
            <h1 class="admin-header">Edit User</h1>
            <section class="forms">
                <div class="data-form">
                    <form class="form" method="POST" action="admin-user-edit.php" name="edit">
                        <input class="input" type="hidden" name="userID" id="userID" value="<?= $userID ?>">
                        <label class="label" for="firstName">First Name</label>
                        <input class="input" type="text" name="firstName" id="firstName" value="<?= $firstName ?>" required autofocus>
                        <label class="label" for="lastName">Last Name</label>
                        <input class="input" type="text" name="lastName" id="lastName" value="<?= $lastName ?>" required>
                        <label class="label" for="houseNumber">House Number</label>
                        <input class="input" type="text" name="houseNumber" id="houseNumber" value="<?= $houseNumber ?>" required>
                        <label class="label" for="street">Street</label>
                        <input class="input" type="text" name="street" id="street" value="<?= $street ?>" required>
                        <label class="label" for="city">City</label>
                        <input class="input" type="text" name="city" id="city" value="<?= $city ?>" required> 
                        <label class="label" for="postCode">Post Code</label>
                        <input class="input" type="text" name="postCode" id="postCode" value="<?= $postCode ?>" required>   
                        <label class="label" for="subscription">News Letter</label>
                        <?php
                            if($subscription){
                                echo '<input class="input" type="checkbox" name="subscription" id="subscription" checked>';
                            }else {
                                echo '<input class="input" type="checkbox" name="subscription" id="subscription">';
                            }
                        ?>
                        
                        <input class="button" type="submit" name="update" id="update" value="Update">                        
                    </form>
                </div>
            </section>            
        </main>
    </body>
</html>