<?php 

require 'include/_header.inc.php'; 
require 'classes/Dbh.class.php';
require 'classes/User.class.php';

$user = new User();
var_dump($user->showUser());

require 'include/_footer.inc.php'; 