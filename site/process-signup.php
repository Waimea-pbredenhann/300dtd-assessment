<?php require_once '_config.php'; ?>
<?php require 'partials/top.php'; ?>
<?php require_once 'lib/db.php'; ?>
<?php require 'partials/header.php'; ?>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!-- Any errors -->

<!-- Note to self - Maybe add methods to have a better secured signup, A-Z, numbers, special characters, etc.  -->
<main>
<?php
    consoleLog($_POST, 'Form Data');

    $fore = $_POST['forename'];
    $sur = $_POST['surname'];
    $user = $_POST['username'];
    $pass1 = $_POST['password_1'];
    $pass2 = $_POST['password_2'];

    if ($pass1 !== $pass2) {// Checking if pass1 and pass2 match
        echo '<h2>Passwords do not match</h2>';
        echo '<p><a href="signup-form.php">Try again</a></p>';
        exit();
    }
    //Hashing pass1 
    $hash = password_hash($pass1, PASSWORD_DEFAULT);
    consoleLog($hash, 'Hashed Password');

    $db = connectToDB();

    $query = 'INSERT INTO users (forename, surname, username, password, hash) VALUES (?, ?, ?, ?, ?)';
    $stmt = $db->prepare($query);
    try {
        $stmt->execute([$fore, $sur, $user, $pass1, $hash]);
        echo '<h2>Account created</h2>';
        echo '<p><a href="index.php">Home</a></p>';
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) { // Duplicate entry error code
            echo '<h2>Username already exists</h2>';
            echo '<p><a href="signup-form.php">Try again</a></p>';
        } else {
            echo '<h2>Error: ' . $e->getMessage() . '</h2>';
            echo '<p><a href="signup-form.php">Try again</a></p>';
        }
    }
    //^^^^^^^^^^^^^^^^^^^^^^^^ Not working, or doesn't do what I expect
?>
</main>

<?php require 'partials/footer.php'; ?>
<?php require 'partials/bottom.php'; ?>
