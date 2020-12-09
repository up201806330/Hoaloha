<?php
  include_once('../includes/session.php');
  include_once('../database/db_question.php');

  $idUser = $_POST['idUser'];
  $idTopic = $_POST['idTopic'];
  $question = $_POST['question'];
  $data = $_POST['data'];

  $questionId = insertQuestion($idUser,$idTopic,$question,$data);
  $lastQuestionAdded = getQuestion($questionId);

  echo(json_encode($lastQuestionAdded));
  
?>