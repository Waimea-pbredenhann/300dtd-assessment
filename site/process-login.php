
<?php require_once '_config.php'; ?>
<?php require_once 'lib/db.php'; ?>
<?php require 'partials/top.php'; ?>
<?php require 'partials/header.php'; ?>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!-- Any errors -->
    <main>

<?php

consoleLog($_POST, 'Form Data');

$user = $_POST['user'];
$pass1 = $_POST['password'];

$db = connectToDB();
$query = 'SELECT * FROM users WHERE username = ?';
$stmt = $db->prepare($query);
$stmt->execute([$user]);
$userData = $stmt->fetch();

consoleLog($userData, 'DB data');
if ($userData) {
    if (password_verify($pass1, $userData['hash'])) {
        // We got here, so user and pass ok :>

        // Save user info for later use
        $_SESSION['user']['loggedIn'] = true;
        $_SESSION['user']['admin'] = $userData['admin'];
        $_SESSION['user']['forename'] = $userData['forename'];
        $_SESSION['user']['surname'] = $userData['surname'];
        // Heading over to page :>
        header('location: ../site/user-view.php');
        exit();
    } else {
        echo '<h2>Incorrect password</h2>';
        echo '<p>Try again or <a href="../site/form-signup.php">sign up</a>.</p>';
        echo '<form method="POST" action="">
                <input type="hidden" name="user" value="' . htmlspecialchars($user) . '">
                <label for="password">Password:</label>
                <input type="password" name="password" required>
                <input type="submit" value="Try Again">
              </form>';
    }
} else {
    echo '<h2>User account does not exist</h2>';
    echo '<p><a href="../site/form-signup.php">Sign up</a></p>';
}

echo '<p>Try again or <a href="../site/index.php">Homepage</a></p>';
?>

    </main>

    <?php require 'partials/footer.php'; ?>

<?php require 'partials/bottom.php'; ?>
