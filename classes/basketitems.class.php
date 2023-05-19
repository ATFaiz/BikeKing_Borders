<?php

class Basketitems extends DB {

    private $basketID;
    private $productID;
    private $quantity;

    public function getBasketID(){
        return $this->basketID;
    }

    public function setBasketID($basketID){
        $this->basketID = $basketID;
    }

    public function getProductID(){
        return $this->productID;
    }

    public function setProductID($productID){
        $this->productID = $productID;
    }

    public function getQuantity(){
        return $this->quantity;
    }

    public function setQuantity($quantity){
        $this->quantity = $quantity;
    }

    public function checkBasketItem($productID){

        $qty = 0;

        $sql = "SELECT quantity FROM basketitems WHERE productID = :productID";

        try
        {
            $result = $this->dbConnect()->prepare($sql);
            $result->bindParam(':productID', $productID);
            $result->execute();
            $row = $result->fetch();
            if($row){
                $qty = $row['quantity']; 
            }

        }
        catch(PDOException $e)
        {
            $msg = "<h1>" . $e->getMessage() . "</h1>";
        }

        return $qty;

    }

    public function createNewBasketItem($productID, $quantity){

        $qty = $this->checkBasketItem($productID);

        if($qty > 0){
            $quantity = $qty + $quantity;

            $sql = "UPDATE basketitems
                    SET quantity = :quantity
                    WHERE productID = :productID";
        }else {

            $sql = "INSERT INTO basketitems (productID, quantity) VALUES (:productID, :quantity)";

        }

        try
        {
            $result = $this->dbConnect()->prepare($sql);
            $result->bindParam(':productID', $productID);
            $result->bindParam(':quantity', $quantity);
            $result->execute();

        }
        catch(PDOException $e)
        {
            $msg = "<h1>" . $e->getMessage() . "</h1>";
        }
    }

    public function deleteBasketItem($productID){

        $sql = "DELETE FROM basketitems WHERE productID = :productID";

        try
        {
            $result = $this->dbConnect()->prepare($sql);
            $result->bindParam(':productID', $productID);
            $result->execute();

            $count = $result->rowCount();  // Count the number of rows deleted //
        }
        catch(PDOException $e)
        {
            $msg = "<h1>" . $e->getMessage() . "</h1>";
        }

    }

    public function listBasket(){

        $sql = "SELECT products.productID, products.productCode, products.productName,
                products.price, products.image, basketitems.quantity
                FROM products
                INNER JOIN basketitems ON basketitems.productID = products.productID";

        try{
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