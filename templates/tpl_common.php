<?php 
include_once('../includes/session.php');
include_once('../templates/tpl_auth.php'); 
include_once('../templates/tpl_messages.php');

function draw_header($draw_login = true) { 
/**
 * Draws the header for all pages.
 */?>
  <!DOCTYPE html>
  <html lang="en">

    <head>
        <title>Hoa Aloha</title>
        <link rel="icon" href= "../assets/logo.png">
        <meta charset="utf-8">
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" href="../css/style.css">
        <script src="../js/main.js" defer></script>
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Round">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/2fb51e88be.js" crossorigin="anonymous"></script>
    </head>

    <body>
        <?php 
        draw_messages();
        ?>
        <header>
            <a href="main.php">
                <img class="logo" src="../assets/logo.png" width="80" height="80">
            </a>
            <ul class="authentication">
                <?php if ($draw_login){
                    if (isset($_SESSION['username']) && !empty($_SESSION['username'])) draw_logout($_SESSION['username']);
                    else draw_login_button();
                }?>
            </ul> 
        </header>  

        <?php     
        // Login floating object
        if ($draw_login){
            if (!isset($_SESSION['username']) || empty($_SESSION['username'])) draw_login();   
        }

        // Draw error/success messages
        ?>
        
<?php } ?>

<?php function draw_footer() { 
/**
 * Draws the footer for all pages.
 */ ?>
    <footer>
        <div class="footer-bar"></div>
        <div class="footer-content">
            <h2>©2020 Hoa Aloha - All Rights Reserved</h2>
            <h2>Web Languages and Technologies - LTW 20/21</h2> 
        </div>
    </footer>
  </body>
</html>
<?php } ?>


<?php function start_adopt_favourite_container() { 
/**
 * Start Adopt / Favourite Buttons Container
 */ ?>
    <div class="adopt-favourite-container">
<?php } ?>

<?php function end_adopt_favourite_container() { 
/**
 * End Adopt / Favourite Buttons Container
 */ ?>
    </div>
<?php } ?>