<head>
<style>
.slider {
width: 100%;
padding: 0.5rem 1rem;
border-top: 2px solid #000000;
margin: 0.5rem 0;
}
.slide-header {
padding-bottom: 0.5rem;
font-size: 1.25rem;
}
.slide-cards {
display: flex;
gap: 1rem;
flex-wrap: nowrap;
overflow: auto;
}
.slide-card {
display: flex;
flex-direction: column;
flex: 0 0 25%;
align-items: center;
}
.slide-image {
width: 100%;

}
.slide-image:hover img {
box-shadow: 0px 10px 0px -5px rgba(0,0,0,0.6);
}
.slide-image img {    
width: 100%;

}
.slide-cost::before {
content:"\00a3";
vertical-align: super;
font-size: 0.75rem;
font-weight: bold;
}
.slide-cost {
color: #000000;
font-weight: 400;
text-align: center;
padding-bottom: 1rem;
}
</style>
</head>

<?php

 

$offers = new Offers();

$rows = $offers->listOffers();

$record = 0;

 


echo '<h2>Current Offers</h2>';

echo '<section class= "slider">';
echo '<div class=" col-md-12  slide-cards">';

while($record < count($rows)){
echo '  <div class="col-md-3  slide-card">';
echo '<a href="productItem.php?productCode=' . $rows[$record]['productCode'] .'">';
echo '      <h4 style="font-size:1.5vw;" class="card-title" style="padding-bottom:15px;">'.$rows[$record]['productName'].'</h4>';
echo '      <div class="slide-image">';
echo '          <img  sytle="height:400px;" src="data:image/jpeg;base64,' . base64_encode($rows[$record]['image']) . '" alt="' . $rows[$record]
['productName'] . '"/>';
echo '      </div>';
echo '      <h4 class="productPrice standard-price">£ '.$rows[$record]['price'].'</h4>';
echo '      <h4 class="productSale">£ '.$rows[$record]['sprice'].'</h4>';
echo '  </div>';
echo '</a>';
$record++;
}
echo '  </div>';
echo '</section>';
?>
