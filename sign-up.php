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
    
</head>
<body>
    <div class="container">
    <div class = "row">
    <?php
    include('header.php');
    ?>
    </div>

    <div>
  <h2 style="text-align: center; padding-top: 3%;font-size: 2.4vw; font-weight: bold;">Registration form</h2>
 

  <div class="row" style="position: relative; margin: auto;  " >
    <div class ="col-md-12" style="padding-left: 25%; padding-right: 25%;">
   
  <form method="post"  name="sign-up">
    <div class="form-group">
      <label for="fname">First Name:</label>
      <input type="text" class="form-control"  placeholder="Enter first name" name="fname" required >
    </div>
    <div class="form-group">
      <label for="fname">Last Name:</label>
      <input type="text" class="form-control"  placeholder="Enter last name" name="lname" required >
    </div>
    <div class="form-group">
      <label for="fname">House Number:</label>
      <input type="text" class="form-control"  placeholder="Enter house number" name="house-no" required >
    </div>
    <div class="form-group">
      <label for="fname">Street:</label>
      <input type="text" class="form-control"  placeholder="Enter street name" name="street" required >
    </div>
    <div class="form-group">
      <label for="fname">City:</label>
      <input type="text" class="form-control"  placeholder="Enter city name" name="city" required >
    </div>
    <div class="form-group">
      <label for="fname">Post Code:</label>
      <input type="text" class="form-control"  placeholder="Enter post code" name="post-code" required >
    </div>
    
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="text"  class="form-control"  placeholder="Enter email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
      </div>
    <div class="form-group">
      <label for="pswd">Password:</label>
      <input type="password" class="form-control" placeholder="Enter password" name="password" id="password" onchange="check_password();" required >
    </div>
    <div class="form-group">
      <label for="pswd">Confirm Password:</label>
      <input type="password" class="form-control" placeholder="Enter password" name="confirm" id="confirm" onchange="check_password();"required >
    </div>
    <div class="form-group">
      
      <input type="hidden" name="news" >
    </div>
      
    <button style="background-color: chocolate; border: chocolate;padding-left: 30px; padding-right: 30px; " type="submit" id="submit" class="btn btn-primary" name="signup_btn" disabled >Sign Up</button>
 
  </form>
  <br>

</div>
</div>
</div>

<?php
$update = false;

    if(isset($_POST['signup_btn'])){
    $email = $_POST['email'];
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $houseNumber = $_POST['house-no'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $postCode = $_POST['post-code'];
    if(isset($_POST['news'])){
    $subscription = 0;
      }
      else
                    {
      $subscription = 1;
                    }
      $password = $_POST['password'];
      $user = new Users("",$email, $firstName, $lastName, $houseNumber, $street, $city, $postCode, $subscription);
      $update = $user->addUser();

          if($update){
          $login = new Login();
          $login->setEmailAddress($email);
          $login->setPassword($password);
          $login->addLogin();

          }

          }

?>

<script>
 function check_password() {

    const password = document.getElementById('password').value;
    const confirm = document.getElementById('confirm').value;   
    if (password == confirm) {
    document.getElementById('submit').disabled = false;
    } else {
    document.getElementById('submit').disabled = true;
    }
    }
</script>

   

    <div class = "row">
    <?php
    include('footer.php');
    ?>
    </div>
    </div>

</body>
</html>