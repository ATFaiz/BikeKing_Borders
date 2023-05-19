<?php

class Products extends DB {

    private $productID;
    private $productCode;
    private $productName;
    private $manufacturer;
    private $productDesc;
    private $price;
    private $category;
    private $image;

    public function setProductID($productID){
        $this->productID = $productID;
    }

    public function getProductID(){
        return $this->productID;
    }

    public function setProductCode($productCode){
        $this->productCode = $productCode;
    }

    public function getProductCode(){
        return $this->productCode;
    }

    public function setProductName($productName){
        $this->productName = $productName;
    }

    public function getProductName(){
        return $this->productName;
    }

    public function setManufacturer($manufacturer){
        $this->manufacturer = $manufacturer;
    }

    public function getManufacturer(){
        return $this->manufacturer;
    }

    public function setProductDesc($productDesc){
        $this->productDesc = $productDesc;
    }

    public function getProductDesc(){
        return $this->productDesc;
    }

    public function setPrice($price){
        $this->price = $price;
    }

    public function getPrice(){
        return $this->price;
    }

    public function setCategory($category){
        $this->category = $category;
    }

    public function getCategory(){
        return $this->category;
    }

    public function setImage($image){
        $this->image = $image;
    }

    public function getImage(){
        return $this->image;
    }

    public function createProduct($productCode, $productName, $manufacturer, $description, 
    $price, $category, $image){     
      
        $sql = "INSERT INTO products (productCode, productName, manufacturer, productDescription,
                            price, category, image)
        VALUE(:productCode, :productName, :manufacturer, :productDescription,
              :price, :category, :imageFile)";

        try
        {
            $result = $this->dbConnect()->prepare($sql);
            $result->bindParam(':productCode', $productCode);
            $result->bindParam(':productName', $productName);
            $result->bindParam(':manufacturer', $manufacturer);
            $result->bindParam(':productDescription', $description);
            $result->bindParam(':price', $price);
            $result->bindParam(':category', $category);
            $result->bindParam(':imageFile', $image);
            $result->execute();
        }
        catch(PDOException $e)
        {
            $msg = "<h1>" . $e->getMessage() . "</h1>";
        }

    }

    public function getProduct($productID){
        $found = False;

        $sql = "SELECT * FROM products WHERE productID = :productID";

        try
        {
            $result = $this->dbConnect()->prepare($sql);
            $result->bindParam(':productID', $productID);
            $result->execute();
            
            $row = $result->fetch();
            if($row > 0){
                $found = True;
                $this->setProductCode($row['productCode']);
                $this->setProductName($row['productName']);
                $this->setManufacturer($row['manufacturer']);
                $this->setProductDesc($row['productDescription']);
                $this->setPrice($row['price']);
                $this->setCategory($row['category']);
                $this->setImage($row['image']);
            }
        }
        catch(PDOException $e)
        {
            $msg = "<h1>" . $e->getMessage() . "</h1>";
        }

        return $found;
    }    

    public function retrieveProducts(){

        $sql = "SELECT * FROM products LIMIT 8";

        try
        {
            $result = $this->dbConnect()->query($sql);
            $rows = $result->fetchAll();
        }
        catch(PDOException $e)
        {
            $msg = "<h1>" . $e->getMessage() . "</h1>";
        }

        return $rows;

    }

    public function retrieveCategory($category){

        $sql = 'SELECT * FROM products WHERE category= :category';

        try
        {
            $result = $this->dbConnect()->prepare($sql);
            $result->bindParam(':category', $category);
            $result->execute();
            $rows = $result->fetchAll();
        }
        catch(PDOException $e)
        {
            $msg = "<h1>" . $e->getMessage() . "</h1>";
        }

        return $rows;

    }

    public function getProductDetails($productCode){

        $sql = "SELECT productID, productCode, productName, price, TO_BASE64(image) AS image FROM products WHERE productCode = :productCode";

        $msg = "";  

        try
        {
            $result = $this->dbConnect()->prepare($sql);
            $result->bindParam(':productCode', $productCode);
            $result->execute();
            $row = $result->fetch();
            if($row){
                $this->setProductID($row['productID']);
                $this->setProductCode($row['productCode']);
                $this->setProductName($row['productName']);
                $this->setPrice($row['price']);
                $this->setImage($row['image']);
            }
        }
        catch(PDOException $e)
        {
            $msg = "Error";
        }

        return $row;
  
    }

    public function retrieveOneProduct($productCode){

        $sql = "SELECT * FROM products WHERE productCode = :productCode";

        try
        {
            $result = $this->dbConnect()->prepare($sql);
            $result->bindParam(':productCode', $productCode);
            $result->execute();
            $row = $result->fetch();
            $this->setProductID($row['productID']);
            $this->setProductCode($row['productCode']);
            $this->setProductName($row['productName']);
            $this->setManufacturer($row['manufacturer']);
            $this->setProductDesc($row['productDescription']);
            $this->setPrice($row['price']);
            $this->setCategory($row['category']);
            $this->setImage($row['image']);
            
            $userHistory = new Userhistory();
            $userHistory->addToHistory($this->productID);

        }
        catch(PDOException $e)
        {
            $msg = "<h1>" . $e->getMessage() . "</h1>";
        }

        return $row;

    }    

    public function upDateProduct($productID, $productCode, $productName, $manufacturer, $description, 
                                $price, $category, $image){

        if($image==""){
            $sql = "UPDATE products 
            SET productCode = :productCode, productName = :productName,
                manufacturer = :manufacturer, productDescription = :description, 
                price = :price, category = :category
            WHERE productID = :productID";
        }else {
            $sql = "UPDATE products 
            SET productCode = :productCode, productName = :productName,
                manufacturer = :manufacturer, productDescription = :description, 
                price = :price, category = :category, image = :image
            WHERE productID = :productID";
        }
                                
        try
        {
            $result = $this->dbConnect()->prepare($sql);
            $result->bindParam(':productID', $productID);
            $result->bindParam(':productCode', $productCode);
            $result->bindParam(':productName', $productName);
            $result->bindParam(':manufacturer', $manufacturer);
            $result->bindParam(':description', $description);
            $result->bindParam(':price', $price);
            $result->bindParam(':category', $category);
            if($image!=""){
                $result->bindParam(':image', $image);
            }
            $result->execute();
        }
        catch(PDOException $e)
        {
            $msg = "<h1>" . $e->getMessage() . "</h1>";
        }
    }

    public function deleteProduct($productID){

        $sql = "DELETE FROM products WHERE productID = :productID";

        try
        {
            $result = $this->dbConnect()->prepare($sql);
            $result->bindParam(':productID', $productID);
            $result->execute();
        }
        catch(PDOException $e)
        {
            $msg = "<h1>" . $e->getMessage() . "</h1>";
        }

    }

    public function searchBar($search){

        $rows = null;

        $sql = "SELECT productCode, productName, manufacturer, productDescription, category, image FROM products 
                WHERE MATCH (productCode, productName, manufacturer, productDescription, category) AGAINST (:search)";

        try
        {
            $result = $this->dbConnect()->prepare($sql);
            $result->bindParam(':search', $search);
            $result->execute();
            $rows = $result->fetchAll();
        }
        catch(PDOException $e)
        {
            $msg = "<h1>" . $e->getMessage() . "</h1>";
        }

        return $rows;

    }

    public function userHistory(){

        if(isset($_SESSION['User_ID'])){
            $sql = 'SELECT * FROM products JOIN userhistory ON products.productID = userhistory.productID
            WHERE userhistory.userID = :userID';

            $userID = $_SESSION['User_ID'];

            try
            {
                $result = $this->dbConnect()->prepare($sql);
                $result->bindParam(':userID', $userID);
                $result->execute();
                $rows = $result->fetchAll();
            }
            catch(PDOException $e)
            {
                $msg = "<h1>" . $e->getMessage() . "</h1>";
            }

            return $rows;
        }
    }

    public function relatedProducts($manufacturer, $productCode){

        $rows = null;

        $sql = "SELECT * from products WHERE productCode NOT IN (:productCode) AND manufacturer = :manufacturer";

        try{
            $result = $this->dbConnect()->prepare($sql);
            $result->bindParam(':productCode', $productCode);
            $result->bindParam(':manufacturer', $manufacturer);
            $result->execute();
            $rows = $result->fetchAll();
        }
        catch(PDOException $e)
        {
            $msg = "<h1>" . $e->getMessage() . "</h1>";
        }

        return $rows;

    }

    public function listProducts(){

        $sql = "SELECT * FROM products";

        try
        {
            $result = $this->dbConnect()->query($sql);
            $rows = $result->fetchAll();
    
        }
        catch(PDOException $e)
        {
            $msg = "<h1>" . $e->getMessage() . "</h1>";
        }
    
        return $rows;

    }

}