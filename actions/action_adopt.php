<?php
    include_once('../includes/session.php');
    include_once('../database/db_proposal.php');
    include_once('../database/db_user.php');
    include_once('../database/db_topic.php');
    include_once('../database/db_animal.php');

    $idTopic = $_POST['idTopic'];

    if (!isset($_SESSION['username'])){
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Must be logged in to create adoption proposal');

        header('Location: ../pages/topic.php?id=' . $idTopic);
        die();
    }

    $user = getUser($_SESSION['username']);
    $newName = (getAnimal(getTopic($idTopic)['idPet'])['name'] != $_POST['new_name']) ? $_POST['new_name'] : null;
    $description = $_POST['description'];

    try {
        insertProposal($user['id'], $idTopic, $newName, $description);
        $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Proposal sent!');
    } catch (PDOException $e) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to create adoption proposal! ');
    }

    header('Location: ../pages/topic.php?id=' . $idTopic);
?>