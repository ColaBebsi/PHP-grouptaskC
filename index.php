<?php 

session_start();

require 'include/_header.inc.php'; 
require 'classes/Dbh.class.php';
require 'classes/User.class.php';

echo 'username: ' . $_SESSION['username']. '<br>';
echo 'email: ' . $_SESSION['email']. '<br>';

if (isset($_POST['logout_submit'])) {
    $obj = new User();
    $obj->logoutUser();
}

?>

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
<button type="submit" name="logout_submit">Logout</button>
</form>





<?php require 'include/_footer.inc.php'; ?>