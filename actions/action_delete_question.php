<?php
  include_once('../includes/session.php');
  include_once('../database/db_question.php');

  $idQuestion = $_POST['idQuestion'];

  //echo $animalId;

  //deleteAnimal($animalId);

  try {
    deleteQuestion($idQuestion);
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Question Deleted!');

    echo(json_encode($idQuestion));

  } catch (PDOException $e) {
    $idTopic = topicFromAnimalId($animalId);
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to Delete Question!');
  }
?>