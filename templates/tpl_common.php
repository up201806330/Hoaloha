<?php 

function draw_header() { 
/**
 * Draws the header for all pages.
 */?>
  <!DOCTYPE html>
  <html lang="en">

    <head>
        <title>Hoa Aloha</title>
        <meta charset="utf-8">
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" href="../css/style.css">
        <!-- <script src="https://kit.fontawesome.com/2fb51e88be.js" crossorigin="anonymous"></script> -->
        <script src="../js/main.js" defer></script>
    </head>

    <body>
        <header>
            <img class="logo" src="../assets/logo.png" width="80" height="80">
            <ul class="authentication">
                <li><a href="#" id="loginButton" class="button">Login</a></li>
                <li><a href="../pages/register.php">Register</a></li>
            </ul>
            
        </header>  
        
<?php } ?>

<?php function draw_footer() { 
/**
 * Draws the footer for all pages.
 */ ?>
  </body>
</html>
<?php } ?>