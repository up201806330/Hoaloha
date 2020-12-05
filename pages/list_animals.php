<?php 
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_topic.php');
  include_once("../database/db_topic.php");
  include_once("../database/db_animal.php");
  
  $topics = getAllTopics();

  draw_header();
  // echo '<ul class="animal-list-container">';
  echo '<div class="animal-list-container">';
  echo '<ul class="animal-list-grid">';
  foreach($topics as &$topic){
    $animal = getAnimal($topic['idPet']);
    if ($topic != null && $animal != null) draw_topic_simple($topic['id'], $animal);
    //else header('Location: ../index.php');
  }
  echo '</ul>';
  echo '</div>';
  draw_footer();
  ?>