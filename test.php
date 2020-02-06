<?php 

$input = 'test';
$hashPwd = password_hash($input, PASSWORD_DEFAULT);
var_dump(password_verify('test', $hashPwd));


?>