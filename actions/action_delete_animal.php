<?php
  include_once('../includes/session.php');
  include_once('../database/db_animal.php');

  $animalId = $_POST['animalId'];

  //echo $animalId;

  //deleteAnimal($animalId);

  try {
    deleteAnimal($animalId);
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Deleted Topic!');
    header('Location: ../pages/profile.php?username=' . $_SESSION['username']);
  } catch (PDOException $e) {
    $idTopic = topicFromAnimalId($animalId);
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to Delete Topic!');
    header('Location: ../pages/topic.php?id=' . $idTopic);
  }
?>