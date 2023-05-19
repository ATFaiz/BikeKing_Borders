<?php

class DB {

    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dataBaseName = "bikeking";

    protected function dbConnect() {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dataBaseName;

        try {
            $pdo = new PDO($dsn, $this->user, $this->password);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        }
        catch(PDOException $e) {
            echo "<h1>Database connection failed.</h1><br>";
            exit($e->getMessage());
        }

    }

}