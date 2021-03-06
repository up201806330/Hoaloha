<?php
    include_once('../includes/session.php');
    include_once('../database/db_favourites.php');
    include_once('../database/db_user.php');
    include_once('../database/db_topic.php');

    $idTopic = $_POST['idTopic'];

    if (!isset($_SESSION['username'])){
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Must be logged in to favourite a pet!');
        
        header('Location: ../pages/topic.php?id=' . $idTopic);
        die();
    }

    $username = $_SESSION['username']; $idUser = getUser($username)['id'];

    if (topicWasPostedByUser($idTopic, $idUser)){
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'You cant like your own posts');

        header('Location: ../pages/topic.php?id=' . $idTopic);
        die();
    }

    try {
        // Get, if it exists, this user's favourite on this topic
        $this_favourite_entry = getFavourite($idUser, $idTopic);
        
        if ($this_favourite_entry != false) {
            removeFavourite($idUser, $idTopic);
            $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Removed from favourites!');
        }
        else {
            addFavourite($idUser, $idTopic);
            $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Added to favourites!');
        }
    } catch (PDOException $e) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to toggle favourite!');
    }
    header('Location: ../pages/topic.php?id=' . $idTopic);
?>