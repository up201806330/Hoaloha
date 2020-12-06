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

  $profile = getUser($_GET['username']);
  $topics = getTopicsPostedByUser($_GET['username']);

  draw_header();
  draw_profile($profile);
  start_animals_div($_GET['username']);
  foreach($topics as &$topic) draw_topic_in_profile($topic['id'], getAnimal($topic['idPet']));
  end_animals_div();
  draw_footer();
  ?>