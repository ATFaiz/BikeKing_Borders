<?php

class Users extends DB {

    private $userID;
    private $emailAddress;
    private $firstName;
    private $lastName;
    private $houseNumber;
    private $street;
    private $city;
    private $postCode;
    private $subscription;

    public function __construct($userID, $emailAddress, $firstName, $lastName, $houseNumber, $street, $city, $postCode, $subscription) {
        $this->userID = $userID;
        $this->emailAddress = $emailAddress;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->houseNumber = $houseNumber;
        $this->street = $street;
        $this->city = $city;
        $this->postCode = $postCode;
        $this->subscription = $subscription;
    }

    public function getUserID(){
        return $this->userID;
    }

    public function setUserID($userID){
        $this->userID = $userID;
    }

    public function setEmailAddress($emailAddress){
        $this->emailAddress = $emailAddress;
    }

    public function getEmailAddress(){
        return $this->emailAddress;
    }

    public function setFirstName($firstName){
        $this->firstName = $firstName;
    }

    public function getFirstName(){
        return $this->firstName;
    }    

    public function setLastName($lastName){
        $this->lastName = $lastName;
    }

    public function getLastName(){
        return $this->lastName;
    }

    public function setHouseNumber($houseNumber){
        $this->houseNumber = $houseNumber;
    }

    public function getHouseNumber() {
        return $this->houseNumber;
    }

    public function setStreet($street){
        $this->street = $street;
    }

    public function getStreet(){
        return $this->street;
    }

    public function setCity($city){
        $this->city = $city;
    }

    public function getCity(){
        return $this->city;
    }

    public function setPostCode($postCode){
        $this->postCode = $postCode;
    }

    public function getPostCode(){
        return $this->postCode;
    }

    public function setSubscription($subscription){
        $this->subscription = $subscription;
    }

    public function getSubscription(){
        return $this->subscription;
    }

    private function checkExistingUser() {

        $found = False;

        $sql = "SELECT emailAddress FROM users WHERE emailAddress = :emailAddress";

        try
        {
            $result = $this->dbConnect()->prepare($sql);
            $result->bindParam(':emailAddress', $this->emailAddress);
            $result->execute();

            $rows = $result->fetch(PDO::FETCH_NUM);
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

    public function addUser(){

        $msg = "";
        $update = false;
        $found = $this->checkExistingUser();

        if(!$found){

            $sql = "INSERT INTO users (emailAddress, firstName,  lastName,  houseNumber,  street,  city,  postCode,  subscription) 
                    VALUE (:emailAddress, :firstName, :lastName, :houseNumber, :street, :city, :postCode, :subscription)";
            
            try
            {
                $result = $this->dbConnect()->prepare($sql);
                $result->bindParam(':emailAddress', $this->emailAddress);
                $result->bindParam(':firstName', $this->firstName);
                $result->bindParam(':lastName', $this->lastName);
                $result->bindParam(':houseNumber', $this->houseNumber);
                $result->bindParam(':street', $this->street);
                $result->bindParam(':city', $this->city);
                $result->bindParam(':postCode', $this->postCode);
                $result->bindParam(':subscription', $this->subscription);
                $result->execute();
                $update = true;
            }
            catch(PDOException $e)
            {
                $msg = "<h1>" . $e->getMessage() . "</h1>";
            }
        }
        else
        {
            $msg = "<h1>Record already exists</h1>";
        }

        return $update;

    }    

        public function listUsers(){

            $sql = "SELECT * FROM users";

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

    public function deleteUser($userID){

        $sql = "DELETE FROM users WHERE userID = :userID";

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

    public function upDateUser($userID, $firstName, $lastName, $houseNumber,
                               $street, $city, $postCode, $subscription){
        $sql = "UPDATE users 
                SET firstName = :firstName,
                    lastName = :lastName, houseNumber = :houseNumber, street = :street,
                    city = :city, postCode = :postCode, subscription = :subscription
                WHERE userID = :userID";

        try
        {
            $result = $this->dbConnect()->prepare($sql);
            $result->bindParam(':userID', $userID);
            $result->bindParam(':firstName', $firstName);
            $result->bindParam(':lastName', $lastName);
            $result->bindParam(':houseNumber', $houseNumber);
            $result->bindParam(':street', $street);
            $result->bindParam(':city', $city);
            $result->bindParam(':postCode', $postCode);
            $result->bindParam(':subscription', $subscription);
            $result->execute();
        }
        catch(PDOException $e)
        {
            $msg = "<h1>" . $e->getMessage() . "</h1>";
        }
    }

    public function getUser($userID){
        $found = False;

        $sql = "SELECT * FROM users WHERE userID = :userID";

        try
        {
            $result = $this->dbConnect()->prepare($sql);
            $result->bindParam(':userID', $userID);
            $result->execute();
            
            $row = $result->fetch();
            if($row > 0){
                $found = True;
                $this->setUserID($row['userID']);
                $this->setEmailAddress($row['emailAddress']);
                $this->setFirstName($row['firstName']);
                $this->setLastName($row['lastName']);
                $this->setHouseNumber($row['houseNumber']);
                $this->setStreet($row['street']);
                $this->setCity($row['city']);
                $this->setPostCode($row['postCode']);
                $this->setSubscription($row['subscription']);
            }
        }
        catch(PDOException $e)
        {
            $msg = "<h1>" . $e->getMessage() . "</h1>";
        }

        return $found;
    }

    public function getName(){

        $name = "";
        $sql = "SELECT userID, emailAddress, firstName, lastName FROM users WHERE emailAddress = :emailAddress";

        try
        {
            $result = $this->dbConnect()->prepare($sql);
            $result->bindParam(':emailAddress', $this->emailAddress);
            $result->execute();

            $row = $result->fetch(PDO::FETCH_ASSOC);
            if($row > 0){
                $this->setUserID($row['userID']);
                $name = $row['firstName'] . " " . $row['lastName'];
            }
        }
        catch(PDOException $e)
        {
            $msg = "<h1>" . $e->getMessage() . "</h1>";
        }

        return $name;

    }

}