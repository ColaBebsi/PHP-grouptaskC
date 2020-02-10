<?php 

class User extends Dbh
{
  public function register($email, $username, $password) 
  {
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

      $query = "INSERT INTO user2 (email, username, password) VALUES (?, ?, ?)";
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
                echo 'SUCCESS'. '<br>';
            
                print_r($row); 
                header('Location: index.php');
                echo $_SESSION['username']. '<br>';
                echo $_SESSION['email'] . '<br>';
                echo $_SESSION['id'] . '<br>';
                exit();            
            }        
        } else {            
            // header("Location: login.php");      
            echo 'WRONG PASS';      
            exit();        
        }    
    }

    /* public function checkEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header('Location: index.php');
        }
    } */

    public function logoutUser()
    {
        // session_start();
        session_unset();
        session_destroy();
        header("Location: register.php");
        // echo 'works';
    }
}


