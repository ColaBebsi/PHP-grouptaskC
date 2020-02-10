<?php 

session_start();

require 'include/_header.inc.php';
require 'classes/Dbh.class.php';
require 'classes/User.class.php';

if (isset($_POST['login_submit'])) {
	$email = $_POST['email'];
    $password = $_POST['password'];
	
	$user = new User();
	$user->login($email, $password);


}
	
?>

<div class="login">
	<h1>Login</h1>
	<form action="login.php" method="post">
		<label for="email">
			<i class="fas fa-user"></i>
		</label>
		<input type="text" name="email" placeholder="Email" id="email" required>

		<label for="password">
			<i class="fas fa-lock"></i>
		</label>
		<input type="password" name="password" placeholder="Password" id="password" required>

		<input type="submit" value="Login" name="login_submit">
	</form>
	<a href="register.php">Register</a>
</div>

<?php 'include/_footer.inc.php' ?>