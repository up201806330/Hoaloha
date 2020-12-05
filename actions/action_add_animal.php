<?php
  include_once('../includes/session.php');
  include_once('../database/db_animal.php');
  include_once('../database/db_topic.php');
  include_once('../database/db_user.php');

  $name = $_POST['name'];
  $species = $_POST['species'];
  $weight = $_POST['weight'];
  $color = $_POST['color'];
  $dimensions = $_POST['dimensions'];
  $gender = $_POST['gender'];
  $age = $_POST['age'];
  $photo = $_POST['img'];

  $description = $_POST['description'];

  try {
    $animalId = insertAnimal($name, $species, $weight, $color, $dimensions, $gender, $age, $photo); // TODO handle bad image and bad location here
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Added animal to db!');
    $_SESSION['add_animal'] = 'success';

    if (@$_SESSION['username']) $user = getUser($_SESSION['username']);
    $userId = $user['id'];

    $topicId = insertTopic($userId, $animalId, $description);
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Added topic to db!');
    $_SESSION['add_topic'] = 'success';

    header('Location: ../pages/topic.php?id=' . $topicId);
  } catch (PDOException $e) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to add animal to db!');
    $_SESSION['add_animal'] = 'failure';
    header('Location: ../pages/add_animal.php');
  }
?>