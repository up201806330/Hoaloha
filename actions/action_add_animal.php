<?php
  include_once('../includes/session.php');
  include_once('../database/db_animal.php');
  include_once('../database/db_topic.php');
  include_once('../database/db_user.php');

  $name = strtolower($_POST['name']);
  $species = strtolower($_POST['species']);
  $breed = strtolower($_POST['breed']);
  $weight = strtolower($_POST['weight']);
  $color = strtolower($_POST['color']);
  $dimensions = strtolower($_POST['dimensions']);
  $gender = strtolower($_POST['gender']);
  $age = $_POST['age'];
  $photo = $_POST['img'];

  $description = $_POST['description'];

  try {
    $animalId = insertAnimal($name, $species, $breed, $weight, $color, $dimensions, $gender, $age, $photo);

    if (isset($_SESSION['username'])) $user = getUser($_SESSION['username']);
    $userId = $user['id'];
    $data = date("Y-m-d H:i:s");

    $topicId = insertTopic($userId, $animalId, $description, $data);
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Added topic to db!');

    header('Location: ../pages/topic.php?id=' . $topicId);
  } catch (PDOException $e) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to add animal to db!');
    header('Location: ../pages/add_animal.php');
  }
?>