<?php

class Offers extends DB {

    private $offerID;
    private $productID;
    private $price;

    public function getOfferID(){
        return $this->offerID;
    }

    public function setOfferID($offerID){
        $this->offerID = $offerID;
    }

    public function getProductID(){
        return $this->productID;
    }

    public function setProductID($productID){
        $this->productID = $productID;
    }

    public function getPrice(){
        return $this->price;
    }

    public function setPrice($price){
        $this->price = $price;
    }

    public function listOffers(){
        
        $sql = "SELECT products.productID, products.productCode, products.productName, products.price,
                products.image, offers.offerID, offers.price AS 'sprice'
                FROM products
                INNER JOIN offers ON products.productID = offers.productID";

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

    public function checkOffer($productID){
        
        $found = False;

        $sql = "SELECT productID FROM offers
                WHERE productID = :productID";

        try
        {
            $result = $this->dbConnect()->prepare($sql);
            $result->bindParam(':productID', $productID);
            $result->execute();

            $rows = $result->fetch();
            if($rows > 0){
                $found = True;
            }
        }
        catch(PDOException $e)
        {
            $msg = "<h1>" . $e->getMessage() . "</h1>";
        }

        return $found;

    }

    public function deleteOffer($offerID){
        $sql = "DELETE FROM offers WHERE offerID = :offerID";

        try
        {
            $result = $this->dbConnect()->prepare($sql);
            $result->bindParam(':offerID', $offerID);
            $result->execute();
        }
        catch(PDOException $e)
        {
            $msg = "<h1>" . $e->getMessage() . "</h1>";
        }
    }

    public function getOffer($offerID){
        $found = False;

        $sql = "SELECT * FROM offers WHERE offerID = :offerID";

        try
        {
            $result = $this->dbConnect()->prepare($sql);
            $result->bindParam(':offerID', $offerID);
            $result->execute();
                
            $row = $result->fetch();
            if($row > 0){
                $found = True;
                $this->setOfferID($row['offerID']);
                $this->setProductID($row['productID']);
                $this->setPrice($row['price']);
            }
        }
        catch(PDOException $e)
        {
            $msg = "<h1>" . $e->getMessage() . "</h1>";
        }

        return $found;
    }  
    
    public function upDateOffer($offerID, $productID, $price){

        $sql = "UPDATE offers 
                SET productID = :productID, price = :price
                WHERE offerID = :offerID";

                                
        try
        {
            $result = $this->dbConnect()->prepare($sql);
            $result->bindParam(':offerID', $offerID);
            $result->bindParam(':productID', $productID);
            $result->bindParam(':price', $price);
            $result->execute();
        }
        catch(PDOException $e)
        {
            $msg = "<h1>" . $e->getMessage() . "</h1>";
        }
    }

    public function createOffer($productID, $price){     

        $exist = $this->checkOffer($productID);

        if($exist == False){
      
            $sql = "INSERT INTO offers (productID, price)
                    VALUE(:productID, :price)";

            try
            {
                $result = $this->dbConnect()->prepare($sql);
                $result->bindParam(':productID', $productID);
                $result->bindParam(':price', $price);
                $result->execute();
            }
            catch(PDOException $e)
            {
                $msg = "<h1>" . $e->getMessage() . "</h1>";
            }

        }

    }    

}