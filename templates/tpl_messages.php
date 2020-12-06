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
                    } 
                    else if (@$_SESSION['add_animal']){
                        echo 'Adding animal ' .$_SESSION['add_animal'];
                        unset($_SESSION['add_animal']);
                    }    
                    else if (@$_SESSION['add_animal_page']){
                        echo 'Must be logged in to add an animal';
                        unset($_SESSION['add_animal_page']);
                    }
                    ?>
                </div>
            </div>
        </div>
<?php } ?>