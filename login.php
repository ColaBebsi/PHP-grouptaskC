<?php 

session_start();

require 'include/_header.inc.php';
require 'classes/Dbh.class.php';
require 'classes/User.class.php';
require 'classes/erroruser.class.php';

$error = new Erroruser();


if (isset($_POST['login_submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User();
    $user->login($email, $password);
}

?>
<div class="login">
    <h1>Login</h1>
    <?php 
    if (isset($_GET['error'])) {
        $error->loginError($_GET['error']);
    }
    ?>
    <form action="login.php" method="post">
        <label for="email">
            <i class="fas fa-user"></i>
        </label>
        <input type="text" name="email" placeholder="Email" id="email" >

        <label for="password">
            <i class="fas fa-lock"></i>
        </label>
        <input type="password" name="password" placeholder="Password" id="password" >

        <input type="submit" value="Login" name="login_submit">
    </form>
    <a href="register.php" class="text-info">Register</a>
</div>

<?php 'include/_footer.inc.php' ?>