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
        if (empty($email)||empty($password)) {
            header("Location: ./login.php?error=emptyfields");               
            exit(); 
        }   
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("location: ./login.php?error=invalidmail");
            exit();
        }

        if ($row > 0) {            
            $pwdCheck = password_verify($password, $result['password']);            
            if ($pwdCheck == false) {                
                header("Location: ./login.php?error=wrongpwd");               
                exit();  
        
            } else {                
                //session_start();                
                $_SESSION['id'] = $result['id'];                
                $_SESSION['username'] = $result['username'];                
                $_SESSION['email'] = $result['email'];
                header("Location: ./index.php?success=logged in");  
                echo '<h4 class="text-success">SUCCESS</h4>' ;
                exit();            
            }   

        } else {            
            header("location: ./login.php?error=usernonexisting"); 
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








  
