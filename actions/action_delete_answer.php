<?php
  include_once('../includes/session.php');
  include_once('../database/db_answer.php');

  $idAnswer = $_POST['idAnswer'];

  //echo $idAnswer;

  //echo $animalId;

  //deleteAnimal($animalId);

  //deleteAnswer($idAnswer);

  try {
    deleteAnswer($idAnswer);
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Answer Deleted!');

    echo(json_encode($idAnswer));

  } catch (PDOException $e) {
    $idTopic = topicFromAnimalId($animalId);
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to Delete Answer!');
  }
?>