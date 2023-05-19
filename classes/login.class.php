<?php

class Login extends DB {

    public $userID;
    public $emailAddress;
    public $password;
    public $salt;


    public function setEmailAddress($emailAddress) {
        $this->emailAddress = $emailAddress;
    }

    public function getEmailAddress(){
        return $this->emailaddress;
    }

    public function setPassword($password){
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    private function checkExistingLogin() {

        $found = False;

        $sql = "SELECT emailAddress FROM logins
                WHERE emailAddress = :emailAddress";

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

    public function addLogin(){

        $found = $this->checkExistingLogin();

        if(!$found){

            $sql = "INSERT INTO logins (emailAddress, password, salt)
                    VALUE(:emailAddress, :pword, :salt)";
            
            try
            {
                $result = $this->dbConnect()->prepare($sql);
                $result->bindParam(':emailAddress', $this->emailAddress);
                $result->bindParam(':pword', $this->password);
                $result->bindParam(':salt', $this->salt);
                $result->execute();
            }
            catch(PDOException $e)
            {
                $msg = "<h1>" . $e->getMessage() . "</h1>";
            }
        }
        else
        {
            $msg = "<h1> Record already exists</h1>";
        }

    }

    public function validateLogin($eAddress, $pword){

        $found = False;
        $sql = "SELECT password, salt FROM logins
                WHERE emailAddress = :emailAddress";

        try
        {
            $result = $this->dbConnect()->prepare($sql);
            $result->bindParam(':emailAddress', $eAddress);
            $result->execute();

            $row = $result->fetch(PDO::FETCH_ASSOC);
            
            if($row > 0){
                
                if(password_verify($pword, $row['password'])){
                    $found = True;
                }
                else
                {
                    $msg = "<h1>Email address or Password incorrect.</h1>";
                }
            }
            else
            {
                $msg = "<h1>Email address or Password incorrect.</h1>";
            }
        }
        catch(PDOException $e)
        {
            $msg = "<h1>" . $e->getMessage() . "</h1$row>";
        }

        return $found;

    }

    public function deleteLogin($userID){

        $sql = "DELETE FROM logins WHERE userID = :userID";

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

}

