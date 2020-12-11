<?php
  include_once('../includes/session.php');
  include_once('../database/db_answer.php');

  $idUser = $_POST['idUser'];
  $idQuestion = $_POST['idQuestion'];
  $answer = $_POST['answer'];
  $data = date("Y-m-d H:i:s");

  $answerId = insertAnswer($idUser,$idQuestion,$answer,$data);
  $lastAnswerAdded = getAnswerAndUser($answerId);

  echo(json_encode($lastAnswerAdded));
  
?>