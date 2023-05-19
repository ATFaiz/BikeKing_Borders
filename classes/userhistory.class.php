<?php

class Userhistory extends DB {

    private $userID;
    private $productID;

    public function getUserID(){
        return $this->userID;
    }

    public function setUserID($userID){
        $this->userID = $userID;
    }

    public function getProductID(){
        return $this->productID;
    }

    public function setProductID($productID){
        $this->productID = $productID;
    }

    public function addToHistory($productID){
        if(isset($_SESSION['User_ID'])){

            $userID = $_SESSION['User_ID'];

            $found = $this->checkHistory($userID, $productID);

            if(!$found){

                $sql = "INSERT INTO userhistory (userID, productID) VALUES (:userID, :productID);";

                try
                {
                    $result = $this->dbConnect()->prepare($sql);
                    $result->bindParam(':userID', $userID);
                    $result->bindParam(':productID', $productID);
                    $result->execute();
                }
                catch(PDOException $e)
                {
                    $msg = "<h1>" . $e->getMessage() . "</h1>";
                }

            }
        }
    }

    public function checkHistory($userID, $productID){

        $found = False;

        $sql = "SELECT * FROM userhistory WHERE userID = :userID AND productID = :productID";

        try
        {
            $result = $this->dbConnect()->prepare($sql);
            $result->bindParam(':userID', $userID);
            $result->bindParam(':productID', $productID);
            $result->execute();

            $row = $result->fetch(PDO::FETCH_NUM);
            if($row > 0){
                $found = True;
            }
        }
        catch(PDOException $e)
        {
            $msg = "<h1>" . $e->getMessage() . "</h1>";
        }

        return $found;

    }

    public function deleteHistory($userID){

        $sql = "DELETE FROM userhistory WHERE userID = :userID";

        try
        {
            $result = $this->dbConnect()->prepare($sql);
            $result->bindParam(':userID', $userID);
            $result->execute();
        }
        catch(PDOException $e)
        {
            $msg = "<h1>" . $e->getMessage() . "</h1>";
        }

    }

    public function deleteProductHistory($productID){

        $sql = "DELETE FROM userhistory WHERE productID = :productID";

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

}