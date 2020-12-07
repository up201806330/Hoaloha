<?php
    include_once('../includes/session.php');
    include_once('../database/db_favourites.php');

    $idUser = $_POST['idUser'];
    $idTopic = $_POST['idTopic'];

    try {
        $db_entry = getFavourite($idUser, $idTopic);
        $db_entry != false ? removeFavourite($idUser, $idTopic) : addFavourite($idUser, $idTopic);
        $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Successfully added to/removed from favourites!');
        $_SESSION['favourite'] = 'success';
    } catch (PDOException $e) { 
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to toggle favourite!');
        $_SESSION['favourite'] = 'failure';
    }
    header('Location: ../pages/topic.php?id=' . $idTopic);
?>