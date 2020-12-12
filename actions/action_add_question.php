<?php
  include_once('../includes/session.php');
  include_once('../database/db_question.php');

  $idUser = $_POST['idUser'];
  $idTopic = $_POST['idTopic'];
  $question = $_POST['question'];
  $data = date("Y-m-d H:i:s");

  try{
    $questionId = insertQuestion($idUser,$idTopic,$question,$data);
    $lastQuestionAdded = getQuestionAndUser($questionId);
  
    echo(json_encode($lastQuestionAdded));

    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Question sent!');
  } catch (PDOException $e) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to add question to db!');
  }
  
?>