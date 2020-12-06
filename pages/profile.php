<?php 
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_profile.php');
  include_once('../templates/tpl_topic.php');
  include_once("../database/db_user.php");
  include_once("../database/db_animal.php");
  include_once("../database/db_topic.php");
  
  if (!isset($_GET['username'])){
    header('Location: ../pages/main.php');
    die();
  }

  $username = $_GET['username'];

  $profile = getUser($username);
  $topics = getTopicsPostedByUser($username);

  draw_header();
  draw_profile($profile);
  start_animals_div($username, (@$_SESSION['username'] == $username));
  foreach($topics as &$topic) {
    if ($topic != null) {
      $animal = getAnimal($topic['idPet']);
      if ($animal != null) draw_topic_in_profile($topic['id'], $animal);
    }
  }
  end_animals_div();
  draw_footer();
  ?>