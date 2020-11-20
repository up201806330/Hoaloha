<?php
  include_once('../includes/session.php');
  include_once('../database/db_animal.php');

  $name = $_POST['name'];
  $species = $_POST['species'];
  $weight = $_POST['weight'];
  $color = $_POST['color'];
  $dimension = $_POST['dimension'];
  $photo = $_POST['img'];

  try {
    $id = insertAnimal($name, $species, $weight, $color, $dimension, $photo); // TODO handle bad image and bad location here
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Added animal to db!');
    $_SESSION['add_animal'] = 'success';
    header('Location: ../pages/animal.php?id=' . $id);
  } catch (PDOException $e) { 
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to add animal to db!');
    $_SESSION['add_animal'] = 'failure';
    header('Location: ../pages/add_animal.php');
  }
?>