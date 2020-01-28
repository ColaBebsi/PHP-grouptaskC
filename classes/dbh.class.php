<?php 

class Dbh
{
    private $host = "localhost";
    private $user = 'root';
    private $password = '';
    private $dbName = 'logindb';
    
    protected function connect() 
    {

        try {
            $dataSourceName = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
            $pdo = new PDO($dataSourceName, $this->user, $this->password);
            // 
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Get error message if there is an error
            echo 'Connection failed: ' . $e->getMessage();
        }

       
    }
}