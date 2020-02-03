<?php 

require 'classes/Dbh.class.php';
require 'classes/User.class.php';

// Check for submit
if (isset($_POST['register_submit'])) {

    // Get form data 
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $obj = new User();
    // $obj->setUser($email, $username, $password);
    if($obj->setUser($email, $username, $password)) {
        echo 'Try Again!';
    } else {
        header('Location: login.php');
    }
    
    // if (empty($email) || empty($username) || empty($password)) {
    //     // header('Location: ')
    // }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <label for="email">Email:</label>
    <input type="text" name="email" placeholder="Email" require> 
    <label for="username">Username:</label>
    <input type="text" name="username" placeholder="Username" require>
    <label for="password">Password:</label>
    <input type="text" name="password" placeholder="Password" require>
    <button type="submit" name="register_submit">Register</button>
    </form>
    <a href="login.php">Back to login!</a>
</body>
</html>