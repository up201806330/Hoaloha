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
  //$photo = $_POST['img'];
  $files = $_FILES['images'];

  $description = $_POST['description'];
  

  for ($i=0; $i < count($files['name']) ; $i++){
    if($files['name'][$i] != null && exif_imagetype($files['name'][$i]) != IMAGETYPE_PNG && exif_imagetype($files['name'][$i]) != IMAGETYPE_JPEG){
      $_SESSION['message'][] = array('type' => 'error','content' => 'Images must be png or jpeg!');
      die(header('Location: ../pages/add_animal.php'));
    }
  }


  try {
    $animalId = insertAnimal($name, $species, $breed, $weight, $color, $dimensions, $gender, $age, $files);

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