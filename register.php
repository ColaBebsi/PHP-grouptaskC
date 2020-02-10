<?php 

require 'include/_header.inc.php';
require 'classes/Dbh.class.php';
require 'classes/User.class.php';

if (isset($_POST['register_submit'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

	$user = new User();
	$user->register($email, $username, $password);
	// $user->checkEmail($email);
}

?>

<div class="login">
	<h1>Register</h1>
	<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
		<label for="email">
			<i class="fas fa-envelope"></i>
		</label>
        <input type="text" name="email" placeholder="Email" id="email" required>
        
        <label for="username">
			<i class="fas fa-user"></i>
		</label>
		<input type="text" name="username" placeholder="Username" id="username" required>

		<label for="password">
			<i class="fas fa-lock"></i>
		</label>
		<input type="password" name="password" placeholder="Password" id="password" required>
		
		<input type="submit" value="Register" name="register_submit">
	</form>
    <a href="login.php">Log In</a>
</div>


<?php 'include/_footer.inc.php' ?>