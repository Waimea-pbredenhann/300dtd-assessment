<?php require_once '_config.php'; ?>
<?php require 'partials/top.php'; ?>
<?php require 'partials/header.php'; ?>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!-- Any errors -->
<main>
    <form method="POST" action="process-login.php">
        <label for="user">Username</label>
        <input type="text" name="user" required>
        
        <label for="password">Password</label>
        <input type="password" name="password" required>
        
        <input type="submit" value="Login">
    </form>
    <p>Don't have an account? <a href="signup-form.php">Sign up here</a></p>
</main>

<?php require 'partials/footer.php'; ?>
<?php require 'partials/bottom.php'; ?>
