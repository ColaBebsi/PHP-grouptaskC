<?php 

class User extends Dbh
{
  public function register($email, $username, $password) 
  {
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

      $query = "INSERT INTO user2 (email, username, password) VALUES (:email, :username, :password)";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([$email, $username, $hashedPassword]);
  }

  public function showUser()
  {
      $query = "SELECT * FROM user2";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute();
      
      $results = $stmt->fetchAll();
      return $results;
  }

//   public function login($email, $password)
//   {
//     $query = "SELECT * FROM user2 WHERE email = :email AND password = :password"; 
//   }


  
public function login($email, $password)    
{        
    $sql = "SELECT * FROM user2 WHERE email = ?";        
    $stmt = $this->connect()->prepare($sql);        
    $stmt->execute([$email]);        
    $result = $stmt->fetch();        
    $row = $stmt->rowCount();        
    if ($row > 0) {            
        $pwdCheck = password_verify($password, $result['password']);            
        if ($pwdCheck == false) {                
        //header("Location: ../index.php?error=wrongpwd");      
        echo 'FAILED';          
        exit();            
        } else {                
            //session_start();                
            $_SESSION['id'] = $result['id'];                
            $_SESSION['username'] = $result['username'];                
            $_SESSION['email'] = $result['email'];
            echo 'SUCCESS';
            exit();            
    }        
    } else {            
        // header("Location: ../index.php?error=nouser");      
        echo 'SUPPPP';      
        exit();        
    }    
}

}


