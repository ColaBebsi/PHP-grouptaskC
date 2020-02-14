<?php 

session_start();

require 'include/_header.inc.php'; 
require 'classes/Dbh.class.php';
require 'classes/User.class.php';

echo '<h4>Username: ' . $_SESSION['username']. '</h4><br>';
echo '<h4>E-mail: ' . $_SESSION['email']. '</4><br>';

if (isset($_POST['logout_submit'])) {
    $obj = new User();
    $obj->logoutUser();
}

?>

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
<button type="submit" name="logout_submit">Logout</button>
</form>

<?php require 'include/_footer.inc.php'; ?>
