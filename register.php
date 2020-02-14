<?php 

require 'include/_header.inc.php';
require 'classes/Dbh.class.php';
require 'classes/User.class.php';
require 'classes/erroruser.class.php';
$error = new Erroruser();


if (isset($_POST['register_submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];   
    $password = $_POST['password'];

    try {   
        $user = new User();
        $error->validation($username, $email, $password);
        $user->register($email, $username, $password);
        header("location: ./login.php?success=registercompleted");
    } catch (exception $e) {
        echo 'Caught exception: ',  $e->getMessage();
    }

}


?>

<div class="login">
    <h1>Register</h1>
    <?php 
    if (isset($_GET['error'])) {
        $error->displayError($_GET['error']);
    }
    ?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <label for="email">
        <i class="fas fa-envelope"></i>
    </label>
        <input type="text" name="email" placeholder="Email" id="email">
        
        <label for="username">
            <i class="fas fa-user"></i>
        </label>
        <input type="text" name="username" placeholder="Username" id="username">

        <label for="password">
           <i class="fas fa-lock"></i>
        </label>
        <input type="password" name="password" placeholder="Password" id="password">

        <input type="submit" value="Register" name="register_submit">
    </form>
    <a href="login.php" class="text-info" >Login</a>
</div>

<?php 'include/_footer.inc.php' ?>