const company = document.getElementById('amend-company') //Find element and pass value to constant//

const exit_admin = document.getElementById('exit-admin');

const user_information = document.getElementById('user-information');

const product_information = document.getElementById('product-information');

const offer_information = document.getElementById('offer-information');

 

company.addEventListener('click', function () { //Create an click event, if clicked open web page //

window.location.href = "admin-company.php";

});

 

exit_admin.addEventListener('click', function () {

window.location.href = "index.php";

});

 

user_information.addEventListener('click', function () {

window.location.href = "admin-users.php";

});

 

offer_information.addEventListener('click', function(){

window.location.href = "admin-offers.php";

});

 

product_information.addEventListener('click', function () {

window.location.href = "admin-products.php";

});