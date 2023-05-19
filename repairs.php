
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
    <style>
img{
  border-radius:8px;

  }
  @media screen and (max-width: 768px) {
    .responsive{
    display: none;
      }
 }


 .p{
  font-size: 16px;
}
 

  th, td {
  padding: 25px;
  }

  td {
    vertical-align: top;
}

.tbl{
  width: 60%;
}
.k{
  border: 4px solid white;
  background-color: #F27021;
  padding: 8px;

}
</style>    
</head>
<body>
    <div class="container">
    <div class = "row">
    <?php
    include('header.php');
    ?>
    </div>
    <div class = "row thumbnail">
<div class="w3-container " id="filter" > 
<div class="bike-data">
  <h2 >Servicing and Repair Options</h2>
    <p style="color:black;" >We recommend having your bike serviced routinely to avoid any issues. Bikes have consumable parts and a small issue now can grow into a larger repair later. When you get your bike serviced at JG Cycles, we will always let you know the cost of any spare parts or unexpected repairs up front, and give you advice to avoid repeat issues, so there’s no need to worry about about a surprise bill now or in the future.

If you're not sure what service you need, why not drop into our shop in Glasgow and let us take a look. Have a cup of coffee, meet our shop mascot Scout, and we'll give you a tailor made quote, specific to your requirements.

We also offer a pick up and drop off service for your convenience. We are happy to collect from anywhere in Glasgow and the greater Glasgow area. Get in touch to arrange your collection.</p>
  <hr>
  </div>
</div>

<div class="w3-container" id="filter" > 
<div class="bike-data">
  <h2>Mini Service - £25</h2>
  <table>
   <tr>
    <td><p style="color:black;">We'll check and make small adjustments to your brakes and gears and ensure they are set up to function properly. Your consumable parts - chain, brake pads, tyres, etc. - will be checked for signs of wear.

All the bolts and fittings on your bike will be torqued to the manufacturer's specifications, ensuring a totally safe ride.</p></td>
    <td><img class="responsive" id="optionalstuff" src="./images/bike-mini-service.jpg" alt="web banner" width="200" hight="250"></td>
  </tr>
</table>
   
    
  <hr>
</div>
</div>

<div class="w3-container" id="filter" > 
<div class="bike-data">
  <h2>Full Service - £45</h2>
  <table>
   <tr>
    <td><p style="color:black;">All of the above, plus furnishing the bike with a full set of new cables and housing. Your brakes will be given a more thorough service with bosses being cleaned and greased, and your seat post will be removed and greased. We'll source and fit any replacements that you might require, as well as any accessories.</p></td>
    <td><img class="responsive" src="./images/bike-full-service.jpg" alt="web banner" width="200" hight="200" ></td>
  </tr>
</table>
  
  <hr>
</div>
</div>

<div class="w3-container" id="filter" > 
<div class="bike-data">
  <h2>Strip down and rebuild - £80</h2>
  <table>
   <tr>
    <td> <p style="color:black;">The gold standard of bike services. Taken down to the bare bones, then brought back to life. All the features of the full service are included, as well as greasing all bearings.</p></td>
    <td><img class="responsive" src="./images/bike-strip-down.jpg" alt="web banner" width="200" hight="250"></td>
  </tr>
</table>
 
  <hr>
</div>
</div>

<div class="w3-container" id="filter" > 
<div class="bike-data">
  <h2>Other services</h2>
  <p style="color:black;">Bear in mind this list is not exhaustive; for a tailor-made quote, swing by the shop or give us a call.</p>
  <table class ="tbl">
   <tr class="k">
    <td class="k">Puncture Repair</td>
    <td class="k">£10</td>
  </tr>
  <tr class="k"> <td> Brand new inner tube provided and fitted. Rim tape £2 extra. </td> 
  <td></td></tr>
  <tr class="k">
    <td class="k">Brake service</td>
    <td class="k">	£7.50 per brake</td>
  </tr>
  <tr class="k">
    <td class="k">Gear service</td>
    <td class="k">£7.50 per brake</td>
  </tr>
  <tr class="k">
    <td class="k">Hydraulic Brake Bleed</td>
    <td class="k">£10 per brake</td>
  </tr>
  <tr class="k">
    <td class="k">Fit tyre / tube to wheel</td>
    <td class="k">£5</td>
  </tr>
  <tr class="k">
    <td class="k">Wheel respoke (inc 1 spoke)</td>
    <td class="k">from £15</td>
  </tr>
  <tr class="k">
    <td class="k">Build from flatpack</td>
    <td class="k">£25 (kids) / £30 (adult)</td>
  </tr>
  <tr class="k">
    <td class="k">Replace bottom bracket or headset</td>
    <td class="k">£15</td>
  </tr>
 
</table>

<p style="color:black; padding: 10px;"> If you need your bicycle repaired or you require any cycling equipment or accessories, contact Bike King Borders today. You can get intouch with ust by calling 0141 556 0545 </p>
 
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
