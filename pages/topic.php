<?php 
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_topic.php');
  include_once('../templates/tpl_animal.php');
  include_once('../templates/tpl_profile.php');
  include_once('../templates/tpl_favourites.php');
  include_once('../templates/tpl_adopt.php');
  include_once("../database/db_topic.php");
  include_once("../database/db_animal.php");
  include_once("../database/db_user.php");
  include_once("../database/db_favourites.php");
  
  $topic = getTopic($_GET['id']);
  if ($topic != null) {
    $animal = getAnimal($topic['idPet']);
    $owner = getUser($topic['username']);
  }
  
  if ($topic == null || $animal == null || $owner == null){
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to load topic');
    $_SESSION['topic'] = 'failure';
    
    header('Location: ../pages/main.php');
    die();
  }

  draw_header();
  draw_animal_full($animal);
  draw_topic_details($topic, $owner);
  
  if (isset($_SESSION['username'])) {
    $current_user = getUser($_SESSION['username']);
    draw_adopt_button();
    draw_adopt_div($current_user['name'], $animal['name'], $topic['id']);
  }
  else {
    echo 'Log in to adopt this pet';
  }

  $favourites = getTopicsFavouritedUsers($topic['id']);
  if ($favourites !== null) {
    draw_favourite_button(count($favourites), $topic['id']);
    start_favourites_div(count($favourites), $animal['name']);
    foreach($favourites as &$favourite) if ($favourite != null) draw_favourite($favourite);
    end_favourites_div();
  }

  draw_footer();
  ?>