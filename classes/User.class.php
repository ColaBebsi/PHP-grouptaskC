<?php 

class User extends Dbh
{
    public function setUser($email, $username, $password)
    {
        $sql = "INSERT INTO user2 (email, username, password) VALUES (?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email, $username, $password]);
    }

  /*   public function getUser($username) {
        $sql = "SELECT * FROM testuser WHERE username = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username]);

        $results = $stmt->fetchAll();
        return $results;
    }
 */
    public function getUser()
    {
        $sql = "SELECT * FROM user2";
        $stmt = $this->connect()->prepare($sql);
        // $stmt = $this->connect();
        // $stmt->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
      
        // $sql = "SELECT * FROM user2 WHERE id = ?";
        // $pdo = $this->connect();
        // $stmt = $pdo->prepare($sql);
        // $stmt->execute([$id]);
        // $results = $stmt->fetchAll();
        // return $results;

        // $sql = "SELECT * FROM user WHERE username = 'gg' AND password = 'wp";
        // $pdo = $this->connect();
        // $stmt = $pdo->prepare($sql);
        // $stmt->execute();
        // $results = $stmt->fetchAll();
        // return $results;
    }

    public function register($email, $username, $password)
    {
        $sql = 'INSERT INTO user2 (email, username, password) VALUES (?, ?, ?)';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email, $username, $password]);
    } 
}