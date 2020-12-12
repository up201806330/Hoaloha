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
                        echo array_pop($_SESSION['messages'])['content'];
                        unset($_SESSION['login']);
                    }
                    else if (@$_SESSION['logout']){
                        echo array_pop($_SESSION['messages'])['content'];
                        unset($_SESSION['logout']);
                    }
                    else if (@$_SESSION['register']){
                        echo array_pop($_SESSION['messages'])['content'];
                        unset($_SESSION['register']);
                    } 
                    else if (@$_SESSION['add_animal']){
                        echo array_pop($_SESSION['messages'])['content'];
                        unset($_SESSION['add_animal']);
                    }    
                    else if (@$_SESSION['add_animal_page']){
                        echo array_pop($_SESSION['messages'])['content'];
                        unset($_SESSION['add_animal_page']);
                    }
                    else if (@$_SESSION['favourite']){
                        echo array_pop($_SESSION['messages'])['content'];
                        unset($_SESSION['favourite']);
                    }
                    else if (@$_SESSION['adoption_proposal']){
                        echo array_pop($_SESSION['messages'])['content'];
                        unset($_SESSION['adoption_proposal']);
                    }
                    else if (@$_SESSION['approve_proposal']){
                        echo array_pop($_SESSION['messages'])['content'];
                        unset($_SESSION['approve_proposal']);
                    }else if (@$_SESSION['refuse_proposal']){
                        echo array_pop($_SESSION['messages'])['content'];
                        unset($_SESSION['refuse_proposal']);
                    }
                    ?>
                </div>
            </div>
        </div>
<?php } ?>