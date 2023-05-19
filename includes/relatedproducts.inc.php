<head>
    <style>
     
    </style>
</head>

<body>

<hr>
<h4 style="text-align:left"><b>Related Items<h4>
<div class="row" style="padding-left:18px;" >
        <?php

			$products = new Products();
			$rows = $products->relatedProducts($manufacturer, $productCode);
			$record = 0;

			if(count($rows) > 0){ 

			while($record < count($rows)){
       ?>
	
			<div class=" thumbnail" >
				<?php echo '<img src="data:image/jpeg;base64,' . base64_encode($rows[$record]['image']) . '"/>';?>
				
					
					<p>
					<small>New arrival</small>
					</p>
					<?php echo '<h4> £' . $rows[$record]['price'] . '</h4>';?>
				
				
				<button style="background-color:chocolate; border:chocolate; padding-left:30px; padding-right:30px;" type="submit" class="btn btn-primary">
					<?php echo '<a style="color:black" href="productItem.php?productCode='.$rows[$record]['productCode'].'">MORE INFO</a>';?>
					</button>
				
		</div>
		<?php
		$record++;

				}
						
			}

		?>
		</div>

</body>
</html>

