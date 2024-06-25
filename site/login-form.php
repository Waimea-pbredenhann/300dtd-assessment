
<?php require_once '_config.php'; ?>

<?php require 'partials/top.php'; ?>

    <?php require 'partials/header.php'; ?>

    <main>

        <form method="POST" action="process-login.php">

        <label for="user">Username</label>
        <input type="text" name="user" required>

        <label for="password">Password</label>
        <input type="text" name="password" required>

        <input type="submit" value="Login">

        </form>

    
    </main>

    <?php require 'partials/footer.php'; ?>

<?php require 'partials/bottom.php'; ?>
