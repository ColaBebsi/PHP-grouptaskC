<?php 
require 'classes/Dbh.class.php';
require 'classes/User.class.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <?php 
    
    $testObj = new User();
    var_dump($testObj->getUser());
    
    ?>

    <form action="" method="post">
    <label for="email">Email:</label>
    <input type="text" name="email" placeholder="Email">
    <label for="password">Password:</label>
    <input type="text" name="password" placeholder="Password">
    <button type="submit" name="submit_login">Login</button>
    </form>
    <a href="register.php">Register here!</a>
</body>
</html>