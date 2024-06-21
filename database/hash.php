<?php 
require_once 'utils.php';

$password = $_GET ['password'];
$hash = password_hash($password, PASSWORD_DEFUALT);

consoleLog($password, 'Password');
consoleLog($hash, ' Hash');

?>