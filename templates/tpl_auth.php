<?php function draw_login() { 
/**
 * Draws the login section and button to register page.
 */ ?>
<div class="login-container">
    <form method="post" action="../actions/action_login.php">
      <input type="text" placeholder="Username" name="username" required>
      <input type="text" placeholder="Password" name="password" required>
      <button type="submit">Login</button>
    </form>
</div>
<div><a href="../pages/register.php">Don't have an account?</a></div>
<?php } ?>

<?php function draw_logout() { 
/**
 * Draws the logout section.
 */ ?>
    <?= '<a>' . $_SESSION['username'] . '</a>'; ?>
    <a href="./actions/action_logout.php">Logout</a>
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
      <input type="file" name="img" accept="image/*">
      <input type="submit" value="Signup">
    </form>

  </section>
<?php } ?>