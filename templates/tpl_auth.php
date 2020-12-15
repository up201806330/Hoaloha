<?php function draw_login() {
/**
 * Draws the login div itself
 */ ?>
<div class="login-container">
  <div class="login-content">
    <div class="close-button-container">
      <a href="#" id="closeButtonLogin" class="close"><span class="material-icons-round">close</span></a>
    </div>
    <h1>Log In</h1>
    <h2>Welcome Back!</h2>
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

<?php function draw_login_button() { 
/**
 * Draws the login and register buttons.
 */ ?>
  <li><a href="#" id="loginButton" class="button"><span class="material-icons-round">login</span></a></li>
  <li><a href="../pages/register.php"><span class="material-icons-round">person_add</span></a></li>
<?php } ?>

<?php function draw_logout($username) { 
/**
 * Draws the logout section.
 */ ?> 
    <li><a href="../pages/profile.php?username=<?=$_SESSION['username']?>" id="usernameButton" class="button"><span class="material-icons-round">person</span></a></li>
    <li><a href="../pages/proposals.php" class="button"><span class="material-icons-round">all_inbox</span></a></li>
    <li><a href="../actions/action_logout.php" id="logoutButton" class="button"><span class="material-icons-round">logout</span></a></li>
<?php } ?>

<?php function draw_register() { 
/**
 * Draws the register section.
 */ ?>
  <section id="signup">
    <div class="register-content">
      <h1>Sign Up</h1>
      <h2>New Here? Welcome!</h2>
      <form method="post" action="../actions/action_register.php" enctype="multipart/form-data">
        <div class="txt_field">
          <input type="text" name="username" required>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="text" name="name" required>
          <span></span>
          <label>Name</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" required>
          <span></span>
          <label>Password</label>
        </div>
        <div class="txt_field">
          <input type="number" name="phone_number" required>
          <span></span>
          <label>Phone Number</label>
        </div>
        <div class="txt_field">
          <input type="email" name="email" required>
          <span></span>
          <label>Email</label>
        </div>
        <div class="txt_field">
          <input type="text" name="location" required>
          <span></span>
          <label>Location</label>
        </div>
        <button type="submit">SIGN UP</button>
      </form>
    </div>
  </section>
<?php } ?>