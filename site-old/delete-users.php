<?php 

// Checking if admin
$admin = $_SESSION['user']['admin'] ?? false;
// If not it loads a diffrent page
if (!$admin) header('location: index.php');



$userID = $_GET['id'] ?? false;

echo '<p> delete users </p>'; 

if (!$userID) die ('No user ID supplied');

echo '<p>ID: '. $userID;

$db - connectToDB();

$query = 'DELETE FROM users WHERE id= ?';
$stmt = $db -> prepare($query);
$stmt->execute([!$userID]);

echo '<p>Success!!!</p>';

echo '<p><a href="list-users.php">See all users</a></p>';