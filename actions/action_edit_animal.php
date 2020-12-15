<?php
  include_once('../includes/session.php');
  include_once('../database/db_topic.php');
  include_once('../database/db_animal.php');

  $name = $_POST['name'];
  $description = $_POST['description'];
  $species = strtolower($_POST['species']);
  $breed = strtolower($_POST['breed']);
  $gender = strtolower($_POST['gender']);
  $weight = $_POST['weight'];
  $color = strtolower($_POST['color']);
  $dimensions = strtolower($_POST['dimensions']);
  $age = $_POST['age'];
  $animalId = $_POST['idAnimal'];

  $idTopic = topicFromAnimalId($animalId)['id'];

  //updateAnimal($animalId, $name, $species, $breed, $weight, $color, $dimensions, $gender, $age);

  try {
    updateTopicDescription($idTopic, $description);
    updateAnimal($animalId, $name, $species, $breed, $weight, $color, $dimensions, $gender, $age);
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Updated animal informations!');
    header('Location: ../pages/topic.php?id=' . $idTopic);
  } catch (PDOException $e) { 
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to update animal informations!');
    header('Location: ../pages/edit_animal.php?animalId=' . $animalId);
  }
?>