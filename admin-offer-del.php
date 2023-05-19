<?php
    
    include 'includes/autoload.inc.php';
    
    if(isset($_GET['offerid'])){

        $offerID = $_GET['offerid'];

        $offer = new Offers();
        $offer->deleteOffer($offerID);

        header('Location: ' . $_SERVER["HTTP_REFERER"] );

    }else {
        header('Location: ' . $_SERVER["HTTP_REFERER"] );
    }
?>