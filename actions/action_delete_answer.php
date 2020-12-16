<?php
  include_once('../includes/session.php');
  include_once('../database/db_question.php');

  $idAnswer = $_POST['idAnswer'];

  //echo $animalId;

  //deleteAnimal($animalId);

  try {
    deleteAnswer($idAnswer);
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Question Deleted!');

    echo(json_encode($idAnswer));

  } catch (PDOException $e) {
    $idTopic = topicFromAnimalId($animalId);
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to Delete Question!');
  }
?>