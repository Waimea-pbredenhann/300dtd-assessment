<?php require_once '_config.php'; ?>
<?php require 'partials/top.php'; ?>
<?php require 'partials/header.php'; ?>

<main>
    <form method="post" action="process-signup.php">
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" value="" required>
        </div>
        <div class="input-group">
            <label>Forename</label>
            <input type="text" name="forename" value="" required>
        </div>
        <div class="input-group">
            <label>Surname</label>
            <input type="text" name="surname" value="" required>
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password_1" required>
        </div>
        <div class="input-group">
            <label>Confirm password</label>
            <input type="password" name="password_2" required>
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="reg_user">Register</button>
        </div>
        <p>
            Already a member? <a href="login-form.php">Sign in</a>
            <a href="process-signup.php">-----</a>
        </p>
    </form>
</main>

<?php require 'partials/footer.php'; ?>
<?php require 'partials/bottom.php'; ?>
