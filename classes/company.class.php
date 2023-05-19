<?php

class Company extends DB {

    private $companyName;
    private $address_1;
    private $address_2;
    private $address_3;
    private $postCode;
    private $contactNumber;
    private $email;
    private $weekDayOpen;
    private $weekDayClose;
    private $saturdayOpen;
    private $saturdayClose;
    private $sundayOpen;
    private $sundayClose;

    public function setCompanyName($companyName){
        $this->companyName = $companyName;
    }

    public function getCompanyName(){
        return $this->companyName;
    }

    public function setAddress1($address1){
        $this->address_1 = $address1;
    }

    public function getAddress1(){
        return $this->address_1;
    }

    public function setAddress2($address2){
        $this->address_2 = $address2;
    }

    public function getAddress2(){
        return $this->address_2;
    }
    
    public function setAddress3($address3){
        $this->address_3 = $address3;
    }

    public function getAddress3(){
        return $this->address_3;
    }

    public function setPostCode($postCode){
        $this->postCode = $postCode;
    }

    public function getPostCode(){
        return $this->postCode;
    }

    public function setContactNumber($contactNumber){
        $this->contactNumber = $contactNumber;
    }

    public function getcontactNumber(){
        return $this->contactNumber;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setWeekDayOpen($weekDayOpen){
        $this->weekDayOpen = $weekDayOpen;
    }

    public function getWeekDayOpen(){
        return $this->weekDayOpen;
    }

    public function setWeekDayClose($weekDayClose){
        $this->weekDayClose = $weekDayClose;
    }

    public function getWeekDayClose(){
        return $this->weekDayClose;
    }    

    public function setSaturdayOpen($saturdayOpen){
        $this->saturdayOpen = $saturdayOpen;
    }

    public function getSaturdayOpen(){
        return $this->saturdayOpen;
    }      

    public function setSaturdayClose($saturdayClose){
        $this->saturdayClose = $saturdayClose;
    }

    public function getSaturdayClose(){
        return $this->saturdayClose;
    }   

    public function setSundayOpen($sundayOpen){
        $this->sundayOpen = $sundayOpen;
    }

    public function getSundayOpen(){
        return $this->sundayOpen;
    }      

    public function setSundayClose($sundayClose){
        $this->sundayClose = $sundayClose;
    }

    public function getSundayClose(){
        return $this->sundayClose;
    }  

    public function updateCompanyDetails(){

        $sql = "UPDATE company
                SET companyName = :companyName,
                    address_1 = :address1,
                    address_2 = :address2,
                    address_3 = :address3,
                    postCode = :postCode,
                    contactNumber = :contactNumber,
                    email = :email,
                    weekDayOpen = :weekDayOpen,
                    weekDayClose = :weekDayClose,
                    saturdayOpen = :saturdayOpen,
                    saturdayClose = :saturdayClose,
                    sundayOpen = :sundayOpen,
                    sundayClose = :sundayClose
                LIMIT 1";

        try
        {
            $result = $this->dbConnect()->prepare($sql);
            $result->bindParam(':companyName', $this->companyName);
            $result->bindParam(':address1', $this->address_1);
            $result->bindParam(':address2', $this->address_2);
            $result->bindParam(':address3', $this->address_3);
            $result->bindParam(':postCode', $this->postCode);
            $result->bindParam(':contactNumber', $this->contactNumber);
            $result->bindParam(':email', $this->email);
            $result->bindParam(':weekDayOpen', $this->weekDayOpen);
            $result->bindParam(':weekDayClose', $this->weekDayClose);
            $result->bindParam(':saturdayOpen', $this->saturdayOpen);
            $result->bindParam(':saturdayClose', $this->saturdayClose);
            $result->bindParam(':sundayOpen', $this->sundayOpen);
            $result->bindParam(':sundayClose', $this->sundayClose);
            $result->execute();
        }
        catch(PDOException $e)
        {
            $msg = "<h1>" . $e->getMessage() . "</h1>";
        }
        
    }

    public function retrieveCompanyDetails(){

        $found = False;

        $sql = "SELECT * FROM company";

        try
        {
            $result = $this->dbConnect()->query($sql);

            $row = $result->fetch();
            if($row > 0){
                $found = True;
                $this->setCompanyName($row['companyName']);
                $this->setAddress1($row['address_1']);
                $this->setAddress2($row['address_2']);
                $this->setAddress3($row['address_3']);
                $this->setPostCode($row['postCode']);
                $this->setContactNumber($row['contactNumber']);
                $this->setEmail($row['email']);
                $this->setWeekDayOpen($row['weekDayOpen']);
                $this->setWeekDayClose($row['weekDayClose']);
                $this->setSaturdayOpen($row['saturdayOpen']);
                $this->setSaturdayClose($row['saturdayClose']);
                $this->setSundayOpen($row['sundayOpen']);
                $this->setSundayClose($row['sundayClose']);
                
            }
        }
        catch(PDOException $e)
        {
            $msg = "<h1>" . $e->getMessage() . "</h1>";
        }

        return $found;        
        
    }

}