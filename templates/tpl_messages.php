<?php 
include_once('../includes/session.php');

function draw_messages() { 
    /**
     * Draws success or failure message objects, if any
     */?>
        <div class="message-container">
            <div class="message-content">
                <div class="txt_field">
                    <?php 
                    if (@$_SESSION['login']){
                        echo 'Login ' .$_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                    else if (@$_SESSION['logout']){
                        echo 'Logout ' .$_SESSION['logout'];
                        unset($_SESSION['logout']);
                    }
                    else if (@$_SESSION['register']){
                        echo 'Register ' .$_SESSION['register'];
                        unset($_SESSION['register']);
                    } ?>
                </div>
            </div>
        </div>
<?php } ?>