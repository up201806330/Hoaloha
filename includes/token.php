<?php
    include_once('../includes/session.php');
    include_once('../templates/tpl_messages.php');

    function validate_token($postVar){
        if ($_SESSION['csrf'] !== $postVar){
            $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Request does not appear to be legitimate');
            header('Location: ../pages/main.php');
        }
    }

?>