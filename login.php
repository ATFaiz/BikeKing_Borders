<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bike King Borders</title>
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css"> -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    
</head>
<body>
    <div class="container">
    <div class = "row">
    <?php
    include('header.php');
    ?>
    </div>
    <div class = "row">

    <?php


$found = false;
$msg = null;

// session_start();
// if(isset($_SESSION['User_ID'])){
// header('Location:.php');
// }

 if(isset($_POST['signin_btn'])){
$login = new Login();
$emailAddress = $_POST['email'];
$password = $_POST['password'];

$found = $login->validateLogin($emailAddress, $password);

if($found){
$user = new Users("",$emailAddress,"","","","","","","");
$name = $user->getName();
$userID = $user->getUserID();
$_SESSION['User_ID'] = $userID;
$_SESSION['name'] = $name;
$_SESSION['email'] = $emailAddress;

header('Location:index.php');
 

// Cookie Code - Set Cookie -------------------------------------------------
if(!isset($_COOKIE["user"])){
$lastVisitDate = date("d/m/Y");
setcookie("user", $name, time()+(60*60*24*30));
setcookie("visitDate", $lastVisitDate, time()+(60*60*24*30));
setcookie("active", "true", time()+(60*60+24));
}
   // ------------------------------------------------------------------
}
}

 session_write_close();
?>

    <h2 style="text-align: center; padding-top: 3%; font-size: 2.4vw; font-weight: bold;">Login</h2>
   <div class="row" style="position: relative; margin: auto;" >
    <div class ="col-md-12" style="padding-left: 25%; padding-right: 25%;">
   
  <form action="" method="post" action="index.php">
    <div class="form-group">
        <label for="email">Email Address:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email">
      </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter your password" name="password">
    </div>
    <button style="background-color: chocolate; border: chocolate; padding-left: 30px; padding-right: 30px;" type="submit" class="btn btn-primary" name="signin_btn">Sign In</button>

    <P style="color:black; font-weight:bold"><br>
    <br> To Register Please Click<a href="sign-up.php">
    
    Here ....
    <br>
    </a>
    </p>
    <br>
  </form>

</div>
</div>
    </div>



    <div class = "row">
    <?php
    include('footer.php');
    ?>
    </div>
    </div>
</body>
</html>





