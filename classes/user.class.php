<?php 

class User extends Dbh
{

    public function register($email, $username, $password) 
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO user2 (email, username, password) VALUES (:email, :username, :password)";
        $stmt = $this->connect()->prepare($query);

        try {
            $stmt->execute([$email, $username, $hashedPassword]);
        } catch (exception $e) {
            echo $e->getMessage();
        } 
    }

    public function showUser()
    {
        $query = "SELECT * FROM user2";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
      
        $results = $stmt->fetchAll();
        return $results;
    }


    public function login($email, $password)
    {        
        $sql = "SELECT * FROM user2 WHERE email = ?";        
        $stmt = $this->connect()->prepare($sql);        
        $stmt->execute([$email]);        
        $result = $stmt->fetch();        
        $row = $stmt->rowCount();        

        if (empty($email)||empty($password)) {
            header("Location: ./login.php?error=emptyfields");               
            exit(); 
        }   
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))	{
            header("location: ./login.php?error=invalidmail");
            exit();}

    if ($row > 0) {            
        $pwdCheck = password_verify($password, $result['password']);            
        if ($pwdCheck == false) {                
        header("Location: ./login.php?error=wrongpwd");               
        exit();  
        
        }else {                
            //session_start();                
            $_SESSION['id'] = $result['id'];                
            $_SESSION['username'] = $result['username'];                
            $_SESSION['email'] = $result['email'];
            echo '<h4 class="text-success">SUCCESS</h4>' ;
            exit();            
        }   

    } else {            
        header("location: ./login.php?error=usernonexisting"); 
        exit();        
    }    
    }
}
