<?php

include('header.php');

 

if(isset($_POST['search'])){

$search = $_POST['search'];

 

$product = new Products();

 

$rows = $product->searchBar($search);

$record = 0;

 

} else {

header("Location:index.php");

};

if(count($rows) > 0){

 

while($record < count($rows)){

echo '<a href="productItem.php?productCode=' . $rows[$record]['productCode'] .'">';

echo '  <div class="searchResults">';

echo '      <h5 class="productCode"><span class="bold">Product Code - </span>' . $rows[$record]['productCode'] . '</h5>';

echo '      <h5 class="productCode"><span class="bold">Manufacturer - </span>' . $rows[$record]['productName'] . '</h5>';

echo '      <h1 class="productDesc">' . $rows[$record]['productName'] . '</h1>';

echo '      <div class="productImage">';

echo '          <img src="data:image/jpeg;base64,' . base64_encode($rows[$record]['image']) . '" alt=""/>';

echo '      </div>';

echo '  </div>';

echo '</a>';

$record++;

}

} else

{

echo '<h1>No records found matching that search criteria.</h1>';

echo '<script>';

echo 'if ( window.history.replaceState ) {';

echo 'window.history.replaceState( null, null, window.location.href );';

echo '}';

echo '</script>';

}

echo '<script>';

echo 'if ( window.history.replaceState ) {';

echo 'window.history.replaceState( null, null, window.location.href );';

echo '}';

echo '</script>';

?>

<?php

include('footer.php');

?>