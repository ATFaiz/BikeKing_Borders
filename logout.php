<?php

if(isset($_POST['yes'])){

session_start();

$_SESSION = array();

session_destroy();

header("Location:index.php");

}

 

if(isset($_POST['no'])){

header("Location:index.php");

}

 

?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="utf-8">

<title>Title Here</title>

<meta name="author" content="Your name here">

<meta name="description" content="Description here">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="css/style.css">

<link rel="preconnect" href="https://fonts.gstatic.com">

<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Roboto&display=swap" rel="stylesheet">

<script src="https://kit.fontawesome.com/3830352c3e.js" crossorigin="anonymous"></script>

<style>


.form-group{
position: relative;
padding: 3rem 1rem;
width: 100%;
max-width: 100%;
display: flex;
justify-content: center;
}

.data-form {
width: 40%;
display: flex;
flex-direction: column;
justify-content: center;
padding: 1rem;
border: 2px solid #000000;
border-radius: 10px;
box-shadow: 10px 15px 5px rgba(0,0,0,0.5);
margin-top:20%;
}

.data-form a {
color: #ff0000;
padding: 1rem 0;
text-align: center;

}

.data-form-header {
text-align: center;
padding-bottom: 1rem;
font-size: 1.5rem;
color: #F27021;

}

 
.form {
display: flex;
flex-flow: column wrap;
align-items: center;
justify-content: center;
gap: 0.75rem;
padding-bottom: 1rem;
width: 100%;
max-width: 100%;

}

.button {
    
    cursor: pointer;
    
    border: 2px solid #F27021;
    
    width: 100px;
    
    font-size: 0.75rem;
    font-weight: bold;
    
    border-radius: 5px;
    
    padding: 0.5rem 0.75rem;
    
    background-color: #F27021;
    
    color: #ffffff;

    margin-bottom:10px;

    margin-left:20px;
    
    }

    .button:hover, .button.focus {
    
    color: #ffffff;
    
    background-color: #1D1B1B;
    
    border: 2px solid #1D1B1B;
    
    box-shadow: 5px 5px 5px rgba(0,0,0,0.5);
    
    }

</style>

</head>

<body>

<main>

<section class="form-group ">

<div class="data-form ">

<h1 class="data-form-header">Logout</h1>

<form class="form" method="post" action="logout.php" name="logout">

<p style="text-align: center;"><b>Do you wish to logout?<b></p>

<input class="button yes" type="submit" name="yes" value="Yes">

<input class="button no" type="submit" name="no" value="No">

</form>

</div>

</section>

</main>

</body>

</html>