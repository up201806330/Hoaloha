<?php
  include_once('../includes/session.php');
  include_once('../database/db_answer.php');

  $idUser = $_POST['idUser'];
  $idQuestion = $_POST['idQuestion'];
  $answer = $_POST['answer'];
  $data = date("Y-m-d H:i:s");

  try {
    $answerId = insertAnswer($idUser,$idQuestion,$answer,$data);
    $lastAnswerAdded = getAnswerAndUser($answerId);
  
    echo(json_encode($lastAnswerAdded));
    
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Answer sent!');
  } catch (PDOException $e) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to add answer to db!');
  }
  
?>