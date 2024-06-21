<?php
include '../css/styles.css';
include 'utils.php';
include '_session.php';

consoleLog($_POST, 'Form Data');

$fore = $_POST['forename'];
$midd = $_POST['middlename'];
$sur = $_POST['surname'];
$user = $_POST['username'];
$pass = $_POST['password'];

$hash = password_hash($pass, PASSWORD_DEFAULT);
consoleLog($hash, 'Hashed Password');

$db = connectToDB();

$query = 'INSERT INTO users (forename, middlename, surname, username, password, hash)
        VALUES (?, ?, ?, ?, ?, ?)';
$stmt = $db->prepare($query);
$stmt->execute([$fore, $midd, $sur, $user, $pass, $hash]);

echo '<h2>Account created</h2>';
echo '<p><a href="../site/index.php">Home</a></p>';
?>
