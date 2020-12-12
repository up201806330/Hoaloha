<?php
    include_once('../includes/session.php');
    include_once('../database/db_proposal.php');
    include_once('../database/db_user.php');

    $idTopic = $_POST['idTopic'];

    if (!isset($_SESSION['username'])){
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Must be logged in to create adoption proposal');
        $_SESSION['adoption_proposal'] = 'failure';

        header('Location: ../pages/topic.php?id=' . $idTopic);
        die();
    }

    $user = getUser($_SESSION['username']);
    $newName = $_POST['new_name'];
    $description = $_POST['description'];

    try {
    insertProposal($user['id'], $idTopic, $newName, $description);
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Proposal sent!');
    $_SESSION['adoption_proposal'] = 'success';
    } catch (PDOException $e) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to create adoption proposal! ' . $e->getMessage());
    $_SESSION['adoption_proposal'] = 'failure';
    }

    header('Location: ../pages/topic.php?id=' . $idTopic);
?>