<?php //TODO é correto ter isto assim num template?? Template a dar include d auth e session??
include_once('../templates/tpl_auth.php'); 
include_once('includes/session.php');

function draw_navbar(){
    /**
 * Draws the navbar for all pages.
 */?>
    <div class="topnav">
        <a class="active" href="#home">Home</a>
        <a href="#about">About</a>
        <a href="#contact">Contact</a>
        <?php 
        if (isset($_SESSION['username']) && !empty($_SESSION['username'])) draw_logout();
        else draw_login();
        ?>
    </div>
<?php } ?>

