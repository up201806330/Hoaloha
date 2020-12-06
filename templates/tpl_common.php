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
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons+Round">
        <script src="https://kit.fontawesome.com/2fb51e88be.js" crossorigin="anonymous"></script>
        <link href="jquery-plugins/toxin-rangeslider/toxin-rangeslider.css" rel="stylesheet" />
        <script type="text/javascript" src="jquery-plugins/toxin-rangeslider/toxin-rangeslider.js"></script>
    </head>

    <body>
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
        draw_messages();
        ?>
        
<?php } ?>

<?php function draw_footer() { 
/**
 * Draws the footer for all pages.
 */ ?>
  </body>
</html>
<?php } ?>