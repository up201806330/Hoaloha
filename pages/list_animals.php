<?php 
  include_once('../includes/session.php');
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_navbar.php');
  include_once('../templates/tpl_topic.php');
  include_once('../templates/tpl_search.php');
  include_once("../database/db_topic.php");
  include_once("../database/db_animal.php");
  
  
  draw_header();
  draw_navbar();
  echo '<div class="animal-list-container">';

  $allTopics = getAllTopics();
  list($maxWeight, $maxAge) = get_max_weight_and_age($allTopics);

  draw_search_parameters($maxWeight, $maxAge);
  $topics = $_SESSION['search_results'];
  draw_n_results(count($_SESSION['search_results']));
  start_animal_list();
  foreach($topics as &$topic){
    $animal = getAnimal($topic['idPet']);
    if ($topic != null && $animal != null) draw_topic_simple($topic['id'], $animal);
  }
  end_animal_list();
  
  draw_footer();
  ?>