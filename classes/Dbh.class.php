<?php 

class Dbh {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbName = "phplogin";

    public function connect() 
    {
        try {
            $dsn = 'mysql:host=' .  $this->host . ';dbname=' .  $this->dbName;
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $pdo = new PDO($dsn, $this->user, $this->password, $options);
            return $pdo;
        } catch(PDOException $error) {
            echo $error->getMessage();
        }
    }
}