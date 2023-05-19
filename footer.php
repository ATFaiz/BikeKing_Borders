<link rel="stylesheet" href="css/style_footer.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<!--======================footer start======================-->

<footer class="webintern-footer">
<div class="webintern-footer-inner">
<div class="container">
<div class="row">
<div class="col-sm-6 col-md-3 ">
<a class="webintern-footer-logo" href="#">
<img class="img-responsive" src="./footer-images/bike_logo2.png" style="width:100px;" alt="">
</a>
<div class="simple-text dark padding-sm">
    
<p>Bike King Borders is a growing company based in the Glasgow region of Scotland. The company sell and repair road, mountain and hybrid bikes as well as a range of bike accessories and clothing.  In addition, they hire out bikes for daily use on nearby off road bike trails.</p>
</div>
<div class="empty-space xs-25 sm-25"></div>
</div>
<div class="col-sm-6 col-md-2 footer-2">
<!-- webintern_footer_title -->
<h4 class="webintern_footer_title h5"><small> Quik Links</small></h4>
<ul class="webintern-footer-list">
<li><a href="index.php">Home</a></li>
<li><a href="bike.php">Bike</a></li>
<li><a href="repairs.php"> Services </a></li>
<li><a href="clothing.php"> Clothing </a></li>
<li><a href="accessories.php"> Accessories</a></li>
<li><a href="bike-trails.php">Bike Trail</a></li>
<li><a href="sign-up.php">Registration</a></li>
<li><a href="login.php">Login</a></li>
</ul>
<div class="empty-space xs-25 sm-25"></div>
</div>
<div class="col-sm-6 col-md-3 footer-3">
<!-- webintern_footer_title -->
<h4 class="webintern_footer_title h5"><small>Contact Us</small></h4>
<div clas = "p">
<p>Address:</p>
<p><?= $address1 ?></p>
<p><?= $address2 ?></p>
<p><?= $address3 ?></p>
<p><?= $postCode ?></p>
<p>Email address:</p>
<p><?= $email ?></p>
<p>Telephone No:</p>
<p><?= $contactNumber ?></p>

</div>
<div class="empty-space xs-25"></div>
</div>
<div class="col-xs-12 col-md-4 col-sm-6">
<div class="marg-sm-b30"></div>
<!-- webintern_footer_title -->
<h4 class="webintern_footer_title h5"><small>Subscribe Newsletter</small></h4>
<div class="empty-space marg-lg-b20"></div>
<!--
<div class="simple-text last dark ">
<p>Get latest updates and offers.</p>
</div>
-->
<div class="empty-space marg-lg-b15"></div>
<!-- TT-SUBSCRIBE -->
<form action ="subscrib.php" method="post">
<div class="tt-subscribe">
<input type="text" required="" placeholder="Enter your email" name = "email_sub" id="">
<div class="tt-subscribe-submit">
<i class="fa fa-envelope" aria-hidden="true"></i>
<input type="submit" value="" name="submitbtn">
</div>
</div>

</form>
<div class="empty-space marg-lg-b30"></div>
<!-- TT-SOCAIL -->
<ul class="tt-socail">
<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
</ul>
</div>
</div>
</div>
</div>
<div class="tt-copy">
<div class="container">
<div class="row">
<div class="col-sm-6">
<div class="tt-copy-left">Copyright © company 2021. All rights reserved. </div>
</div>
<div class="col-sm-6">
<div class="tt-copy-right">
Created by: <?= $companyName ?>
</div>
</div>
</div>
</div>
</div>
</footer>

