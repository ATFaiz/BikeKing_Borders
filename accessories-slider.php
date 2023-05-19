<head>
    <style>
        /* The heart of the matter */
        .slider {
width: 100%;
padding: 0.5rem 1rem;
border-top: 2px solid #000000;
margin: 0.5rem 0;
}
          
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
<h2>Accessories</h2>
<section class= "slider">
<div class="container-fluid">
    <div class="container-fluid horizontal-scrollable">
    <div class="row text-center">
<?php

$products = new Products();
$category = "accessories";
$rows = $products->retrieveCategory($category);
$record = 0;
while($record < count($rows)){ 
?>
        
        <div class="col-xs-4 thumbnail">
    <img width="288" hight="288" src="data:image/jpeg;base64, <?php echo base64_encode($rows[$record]['image']); ?>" 
    alt="<?php echo $rows[$record]['productName']; ?>">
    <h5 style="font-size:1.5vw; margin:5px; color:black; ;"><?php echo $rows[$record]['productName'];?></h5>
    <button style="background-color: chocolate; border: chocolate;padding-left: 30px; padding-right: 30px; " type="submit" class="btn btn-primary">
   <?php echo' <a style="color:black" href= "productItem.php?productCode=' . $rows[$record]['productCode'] .'"><b>MORE INFO</b></a>';?>
    </button>
        </div>

       


      <?php
        $record++;  // Increment record //

            }

        
      ?>

  
</div>
</div>
</div>
</section>
</body>
</html>