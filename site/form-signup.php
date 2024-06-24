
<form method="post" action="../database/process-signup.php">

        <div class="input-group">
          <label>Username</label>
          <input type="text" name="username" value="<?php echo $username; ?>">
        </div>

        <div class="input-group">
          <label>Forename</label>
          <input type="forename" name="forename" value="">
        </div>

        <div class="input-group">
          <label>Surname</label>
          <input type="surname" name="surname" value="">
        </div>

        <div class="input-group">
          <label>Password</label>
          <input type="password" name="password_1">
        </div>

        <div class="input-group">
          <label>Confirm password</label>
          <input type="password" name="password_2">
        </div>

        <div class="input-group">
          <button type="submit" class="btn" name="reg_user">Register</button>
        </div>
        <p>
                Already a member? <a href="login.php">Sign in</a>
        </p>
  </form>

  <!-- Need to work out groups and how this will connect to website -->