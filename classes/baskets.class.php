<?php

class Baskets extends DB {

    private $basketID;
    private $userID;
    private $date;

    public function getBasketID(){
        return $this->basketID;
    }

    public function setBasketID($basketID){
        $this->basketID = $basketID;
    }

    public function getUserID(){
        return $this->userID;
    }

    public function setUserID($userID){
        $this->userID = $userID;
    }

    public function getDate(){
        return $this->date;
    }

    public function setDate($date){
        $this->date = $date;
    }

    public function checkBasketExist($userID){

        $found = false;

        $sql = "SELECT userID FROM baskets WHERE userID = :userID";

        try
        {
            $result = $this->dbConnect()->prepare($sql);
            $result->bindParam(':userID', $userID);
            $result->execute();
            $found = true;
            
        }
        catch(PDOException $e)
        {
            $msg = "<h1>" . $e->getMessage() . "</h1>";
        }

        return $found;
    }

    public function createNewBasket($userID){

        $exists = $this->checkBasketExist($userID);

        if($exists){

            $sql = "INSERT INTO baskets (userID, date) VALUES (:userID, :date)";

            try
            {
                $result = $this->dbConnect()->prepare($sql);
                $result->bindParam(':userID', $userID);
                $result->bindParam(':date', date("d/m/y"));
                $result->execute();

            }
            catch(PDOException $e)
            {
                $msg = "<h1>" . $e->getMessage() . "</h1>";
            }
        
        }

    }

    public function deleteBasket($userID){

        $sql = "DELETE FROM baskets WHERE userID = :userID";

        try
        {
            $result = $this->dbConnect()->prepare($sql);
            $result->bindParam(':userID', $userID);
            $result->execute();

            $count = $result->rowCount();  // Count the number of rows deleted //
        }
        catch(PDOException $e)
        {
            $msg = "<h1>" . $e->getMessage() . "</h1>";
        }

    }

}