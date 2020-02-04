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


  
// function login($useremailOrName, $userpassword)    
// {        
//     $sql = "SELECT * FROM users WHERE username = ? OR useremail = ?";        
//     $stmt = $this->connect()->prepare($sql);        
//     $stmt->execute([$useremailOrName, $useremailOrName]);        
//     $result = $stmt->fetch();        
//     $row = $stmt->rowCount();        
//     if ($row > 0) {            
//         $pwdCheck = password_verify($userpassword, $result['userpassword']);            
//         if ($pwdCheck == false) {                
//         header("Location: ../index.php?error=wrongpwd");                
//         exit();            
//         } else {                
//             session_start();                
//             $_SESSION['userId'] = $result['id'];                
//             $_SESSION['username'] = $result['username'];                
//             $_SESSION['useremail'] = $result['useremail'];
//             header("Location: ../index.php?login=success");                
//             exit();            
//     }        
//     } else {            
//         header("Location: ../index.php?error=nouser");            
//         exit();        
//     }    
// }

}