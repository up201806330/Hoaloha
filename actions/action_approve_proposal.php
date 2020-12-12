<?php
  include_once('../includes/session.php');
  include_once('../database/db_proposal.php');


  $idUser = $_GET['idUser'];
  $idTopic = $_GET['idTopic'];

  try {
    approveRequest($idUser, $idTopic);
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Approved proposal!');
    $_SESSION['approve_proposal'] = 'success';
    header('Location: ../pages/proposals.php');
  } catch (PDOException $e) { 
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to approve proposal!');
    $_SESSION['approve_proposal'] = 'failure';
    header('Location: ../pages/main.php');
  }

?>