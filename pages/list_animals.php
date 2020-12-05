<?php 
  include_once('../includes/session.php');
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_topic.php');
  include_once("../database/db_topic.php");
  include_once("../database/db_animal.php");
  
  
  draw_header();

  if (count(@$_SESSION['search_results']) > 0) {
    $topics = $_SESSION['search_results'];
    // echo '<ul class="animal-list-container">';
    echo '<div class="animal-list-container">';
    echo '<ul class="animal-list-grid">';
    foreach($topics as &$topic){
      $animal = getAnimal($topic['idPet']);
      if ($topic != null && $animal != null) draw_topic_simple($topic['id'], $animal);
      echo $topic['idPet'];
      echo $topic['id'];
      
      //else header('Location: ../index.php');
    }
    echo '</ul>';
    echo '</div>';
  }
  else echo 'No results match your search :((';
  draw_footer();
  ?>