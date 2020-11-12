<?php //TODO é correto ter isto assim num template?? Template a dar include d auth e session??
include_once('../templates/tpl_auth.php'); 
include_once('../includes/session.php');

function draw_navbar($draw_login = true){
    /**
 * Draws the navbar for all pages.
 */?>
    <div class="topnav">
        <ul>
            <li><a class="active" href="#home">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="#" id="loginButton" class="button">Login</a></li>
        </ul>
        <?php
        if ($draw_login){    
            if (isset($_SESSION['username']) && !empty($_SESSION['username'])) draw_logout();
            else draw_login();

        }
        ?>
    </div>
<?php } ?>

