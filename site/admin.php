<?php

require_once '_session.php';
require_once 'utils.php';

$loggedIn = $_SESSION['user']['loggedIn'] ?? false;
$admin = $_SESSION['user']['admin'] ?? false;

if ($loggedIn) {
    $name = $_SESSION['user']['forename'] . ' ' . $_SESSION['user']['surname'];
    echo '<h1>Welcome ' . $name . '</h1>';

    if ($admin) {
        echo '<p> YOU ARE AN ADMIN</p>';
        echo '<p><a href="list-users.php> See All Users</a></p>';
    }

    echo '<p><a href="../database/process-logout.php">Logout</a></p>';

}
else {
    echo '<h1>Hello, Guest</h1>';
    echo '<p>Please login</p>';
    echo '<p><a href="login-form.php">Login</a></p>';
}