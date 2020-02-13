<?php 

// namespace classes;

// use \FFI\Exception;

class User extends Dbh
{   
    public function register($email, $username, $password) 
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO user2 (email, username, password) VALUES (?, ?, ?)";
        $stmt = $this->connect()->prepare($query);
        try {
            $stmt->execute([$email, $username, $hashedPassword]);
        } catch (Exception $e) {
            echo $e->getMessage();
        } 
    }

    public function login($email, $password)    
    {        
        $query = "SELECT * FROM user2 WHERE email = ?";        
        $stmt = $this->connect()->prepare($query);        
        $stmt->execute([$email]);        
        
        $result = $stmt->fetch();        
        $row = $stmt->rowCount();

        if ($row > 0) {            
            $pwdCheck = password_verify($password, $result['password']);            
            if ($pwdCheck == false) {                
                header("Location: ./login.php?error=wrongpwd");      
                exit();            
            } else {                
                $_SESSION['id'] = $result['id'];                
                $_SESSION['username'] = $result['username'];                
                $_SESSION['email'] = $result['email'];
                header('Location: index.php');
                exit();            
            }        
        } else {            
            header("location: ./login.php?error=wrongpwd"); 
            exit();        
        }       
    }

    public function logoutUser()
    {
        session_unset();
        session_destroy();
        header("Location: login.php");
    }

    public function showUser()
    {
        $query = "SELECT * FROM user2";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
      
        $results = $stmt->fetchAll();
        return $results;
    }

    public $email;
    public $username;
    public $password;

    public function getEmail()
    {
        return $this->email;
    }

    public function getUsername()
    {
        return $this->username;
    }
    
    public function getPassword()
    {
        return $this->password;
    }
}


