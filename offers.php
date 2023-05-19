<head>
    <style>
        /* The heart of the matter */
          
        .horizontal-scrollable > .row {
            overflow-x: auto;
            white-space: nowrap;
        }
          
        .horizontal-scrollable > .row > .col-xs-4 {
            display: inline-block;
            float: none;
        }
        /* Decorations */
          
        .col-xs-4 {
            color: white;
            font-size: 24px;
            padding-bottom: 20px;
            padding-top: 18px;
        }
          
        .col-xs-4:nth-child(2n+1) {
            background: #ECECEC;
           
        }
          
        .col-xs-4:nth-child(2n+2) {
            background: #F4F4F4;
        }
        .h3{
  height: 90px;
}
h3{
  height: 90px;
}
    </style>
</head>

<body>
<h4><b>Bikes<b></h3>

<div class="container-fluid">
    <div class="container-fluid horizontal-scrollable">
    <div class="row text-center">

    
    <?php
$offers = new Offers();
$rows = $offers->listOffers();
$record = 0;
while($record < count($rows)){ 
?>
        
        <div class="col-xs-4 thumbnail">
    <?php echo '<a href="productItem.php?productCode=' . $rows[$record]['productCode'] .'">';?>
    <?php echo '<h5 class="card-title"><b>'.$rows[$record]['productName'].'<b></h5>';?>
    <?php echo '<img src="data:image/jpeg;base64,' . base64_encode($rows[$record]['image']).'"
     alt="' . $rows[$record]['productName'] . '"/>';?>
     <?php echo '<h4 class="productPrice standard-price">£'.$rows[$record]['price'].'</h4>';?>
     <?php echo '<h4 class="productSale">£ '.$rows[$record]['sprice'].'</h4>';?>
     <?php echo '</a>';?>

        </div>

      <?php
        $record++;  // Increment record //

            }
        
      ?>

  
</div>
</div>
</div>

</body>
</html>