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

}