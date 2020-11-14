<?php function draw_login() { 
/**
 * Draws the login section and button to register page.
 */ ?>
<div class="login-container">
  <div class="login-content">
    <div class="close-button-container">
      <a href="#" id="closeButton" class="close"><span class="material-icons-round">close</span></a>
    </div>
    <h1>Log In</h1>
    <form method="post" action="../actions/action_login.php">
      <div class="txt_field">
        <input type="text" name="username" required>
        <span></span>
        <label>Username</label>
      </div>
      <div class="txt_field">
        <input type="password" name="password" required>
        <span></span>
        <label>Password</label>
      </div>
      <button type="submit">LOG IN</button>
      <div class="signup_link"> 
        Not a member? <a href="register.php">Sign Up</a>
      </div>
    </form>
  </div>
</div>
<?php } ?>

<?php function draw_logout() { 
/**
 * Draws the logout section.
 */ ?>
    <?= '<a>' . $_SESSION['username'] . '</a>'; ?>
    <a href="../actions/action_logout.php">Logout</a>
<?php } ?>

<?php function draw_register() { 
/**
 * Draws the register section.
 */ ?>
  <section id="signup">

    <header><h2>New Account</h2></header>

    <form method="post" action="../actions/action_register.php">
      <input type="text" name="username" placeholder="username" required>
      <input type="password" name="password" placeholder="password" required>
      <input type="file" name="profile_img" accept="image/*">
      <input type="number" name="phone_number" placeholder="9** *** ***" required>
      <input type="email" name="email" placeholder="example@here.com" required>
      <input type="text" name="location" placeholder="TEMPORARY" required>
      <input type="submit" value="Signup">
    </form>

  </section>
<?php } ?>