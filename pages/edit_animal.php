<?php 
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_edit_animal.php');
  include_once("../database/db_animal.php");
  include_once("../database/db_topic.php");
  
  $animalId = $_GET['animalId'];

  if (!isset($_GET['username']) || $username != $_SESSION['username']){
    header('Location: ../pages/main.php');
    die();
  }

  $animal = getAnimal($animalId)[0];
  $topic = topicFromAnimalId($animalId);

  draw_header();

  draw_edit_animal($animal,$topic);

  draw_footer();
  ?>