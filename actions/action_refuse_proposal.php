<?php
  include_once('../includes/session.php');
  include_once('../database/db_proposal.php');


  $idUser = $_GET['idUser'];
  $idTopic = $_GET['idTopic'];

  try {
    refuseProposal($idUser, $idTopic);
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Refused proposal!');
    $_SESSION['refuse_proposal'] = 'success';
    header('Location: ../pages/proposals.php');
  } catch (PDOException $e) { 
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to refuse proposal!');
    $_SESSION['refuse_proposal'] = 'failure';
    header('Location: ../pages/main.php');
  }

?>