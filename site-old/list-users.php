<?php
include '../css/styles.css';
require_once '_session.php';
require_once 'utils.php';
// // Checking if admin
// $admin = $_SESSION['user']['admin'] ?? false;
// // If not it loads a diffrent page
// if (!$admin) header('location: index.php');

consoleLog($_POST, 'Form Data');

$user = $_POST['user'];
$pass = $_POST['pass'];

$db = connectToDB();
$query = 'SELECT * FROM users WHERE username = ?';
$stmt = $db->prepare($query);
$stmt->execute([$user]);
$userData = $stmt->fetch();

consoleLog($userData, 'DB data');

    echo '<h1>Welcome ' . $user['username'] . '</h1>';
echo '<ul>';

foreach ($users as $user) {
    echo '<li>' ;
    echo $user['forename'] . ' ' . $user['surname'] . '/' . $user['username'];
    if ($user['admin']) echo '[ADMIN]';
    echo '</li>';

   

    // echo '<a href="delete-users.php?id>';

}
 echo '</ul>';