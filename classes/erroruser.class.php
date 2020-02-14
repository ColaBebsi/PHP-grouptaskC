<?php 

class Erroruser extends User
{
    
    public function displayError($err)
    {   
      
        if ($err == "emptyfields") {
            echo  '<h4 class="text-warning">Fill in all fields</h4>';
        } elseif ($err == "invalidmailusername") {
            echo '<h4 class="text-danger">Invalid format of username and email
                  </h4>';
        } elseif ($err == "invalidmail") {
            echo '<h4 class="text-danger">Invalid format of email </h4>';
        } elseif ($err == "invalidusername") {
            echo '<h4 class="text-danger">Invalid format of username </h4>';
        }
       
    }
    public function loginError($err)
    {   
      
        if ($err == "emptyfields") {
            echo  '<h4 class="text-warning">E-mail and password required</h4>';
        } elseif ($err == "invalidmail") {
            echo '<h4 class="text-danger">Invalid email</h4>';
        } elseif ($err == "wrongpwd") {
            echo '<h4 class="text-danger">Invalid password</h4>';
        } elseif ($err == "usernonexisting") {
            echo '<h4 class="text-danger">User does not exist</h4>';
        } 
    }

    public function validation($username, $email, $password)
    {
        if (empty($username) || empty($email) || empty($password)) {
            header("location: ./register.php?error=emptyfields");
            exit();
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) 
            && !preg_match("/^[a-zA-Z0-9]*$/", $username)
        ) {
            header("location: ./register.php?error=invalidmailusername");
            exit();
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("location: ./register.php?error=invalidmail");
            exit();
        } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            header("location: ./register.php?error=invalidusername");
            exit();
        }
    }
    

}