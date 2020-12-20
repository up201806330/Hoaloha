<?php 
include_once('../includes/session.php');

function draw_messages() { 
/**
 * Draws success or failure message objects, if any
 */ ?>
        <div class="message-container">
            <div class="message-content">
                <div class="txt_field">
                    <?php 
                    if (@$_SESSION['messages']){
                        $message = array_pop($_SESSION['messages']);
                        echo '<div id="' . $message['type'] . '-message">' . $message['content'] . '</div>';
                        // array_pop($_SESSION['messages'])['type'];  error poe texto vermelho ; success poe verde
                        unset($_SESSION['messages']);
                    }
                    ?>
                </div>
            </div>
        </div>
<?php } ?>