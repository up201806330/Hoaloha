<?php 
  include_once('../includes/session.php');
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_topic.php');
  include_once('../templates/tpl_search.php');
  include_once("../database/db_topic.php");
  include_once("../database/db_animal.php");
  
  
  draw_header();

  echo '<div class="animal-list-container">';

  draw_search_parameters();
  draw_n_results(count($_SESSION['search_results']));
  $topics = $_SESSION['search_results'];
  
  echo '<ul class="animal-list-grid">';
  foreach($topics as &$topic){
    $animal = getAnimal($topic['idPet']);
    if ($topic != null && $animal != null) draw_topic_simple($topic['id'], $animal);
  }
  echo '</ul>';
  echo '</div>';
  
  draw_footer();
  ?>