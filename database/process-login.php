<?php
include '../css/styles.css';
require_once '_session.php';
require_once 'utils.php';

consoleLog($_POST, 'Form Data');

session_start();

$user = $_POST['user'];
$pass = $_POST['pass'];

$db = connectToDB();
$query = 'SELECT * FROM users WHERE username = ?';
$stmt = $db->prepare($query);
$stmt->execute([$user]);
$userData = $stmt->fetch();

consoleLog($userData, 'DB data');
if ($userData) {
    if (password_verify($pass, $userData['hash'])) {
        // We got here, so user and pass ok :>

         // Save user info for later use
        $_SESSION['user']['loggedIn'] = true;
        $_SESSION['user']['admin'] = $userData['admin'];
        $_SESSION['user']['forename'] = $userData['forename'];
        $_SESSION['user']['surname'] = $userData['surname'];
        // Heading over to homepage
        header('location: ../site/index.php');
    }

else {
    echo '<h2>Incorrect password</h2>';
    echo '<p>Try again</p>';
    }
}

else {
    echo '<h2> user account doesnt exist</h2>';
    header('location: ../database/form-signup.php');
}

echo '<p><a href="../site/index.php">Home</a></p>';

// Did we actually have a user
//     if ($userData == false) die('No user account');
// // Have an account, so check password
//     if ($pass != $userData['password']) die('Incorrect password');




?>
