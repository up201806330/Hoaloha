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
                    if (@$_SESSION['messages']){
                        echo array_pop($_SESSION['messages'])['content'];
                        // array_pop($_SESSION['messages'])['type'];  error poe texto vermelho ; success poe verde
                        unset($_SESSION['messages']);
                    }
                    ?>
                </div>
            </div>
        </div>
<?php } ?>