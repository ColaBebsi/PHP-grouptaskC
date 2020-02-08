<?php 

require 'include/_header.inc.php';
require 'classes/Dbh.class.php';
require 'classes/User.class.php';

if (isset($_POST['register_submit'])) {
	
	$username = $_POST['username'];
	$email = $_POST['email'];   
	$password = $_POST['password'];

	if (empty($username) || empty($email) || empty($password))  
	{
		header("location: ./register.php?error=emptyfields");
        exit();
	}
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username)) {
        header("location: ./register.php?error=invalid-mail&uid=");
        exit();
}
else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
        header("location: ./register.php?error=invalid-email");
        exit();
    }
	else if(!preg_match("/^[a-zA-Z0-9]*$/",$username))
	{
        header("location: ./register.php?error=invalid-username");
        exit();
	}
	else 
	{
		try 
	{   
		$user = new User();
		$user->register($email, $username, $password);
		header("location: ./login.php?succsess=registercompleted");
		
	} 
		catch (exception $e) 
	{
		echo 'Caught exception: ',  $e->getMessage();
	}

	}
	
}

?>

<div class="login">
	<h1>Register</h1>
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
    <a href="login.php">Login</a>
</div>


<?php 'include/_footer.inc.php' ?>