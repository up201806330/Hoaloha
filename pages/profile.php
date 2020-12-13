<?php 
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_profile.php');
  include_once('../templates/tpl_topic.php');
  include_once("../database/db_user.php");
  include_once("../database/db_animal.php");
  include_once("../database/db_topic.php");
  include_once("../database/db_favourites.php");
  
  if (!isset($_GET['username'])){
    header('Location: ../pages/main.php');
    die();
  }

  $username = $_GET['username'];

  $profile = getUser($username);
  $topics = getTopicsPostedByUser($profile['id']);
  $usersFavourites = getUsersFavourites($profile['id']);

  draw_header();
  draw_profile($profile);
  if($username == $_SESSION['username'])
    draw_edit_profile($username);
  start_profile_animals_div($username, (@$_SESSION['username'] == $username), count($topics));
  foreach($topics as &$topic) {
    if ($topic != null) {
      $animal = getAnimal($topic['idPet']);
      if ($animal != null) draw_topic_in_profile($topic['id'], $animal);
    }
  }
  end_profile_animals_div();

  start_profile_favourites_div($username, (@$_SESSION['username'] == $username), count($usersFavourites));
  foreach($usersFavourites as &$favourite) {
    if ($favourite != null) {
      $fav_topic = getTopic($favourite['idTopic']);
      if ($fav_topic != null){
        $animal = getAnimal($fav_topic['idPet']);
        if ($animal != null) draw_topic_in_profile($fav_topic['id'], $animal);
      }
    }
  }
  end_profile_favourites_div();

  draw_footer();
  ?>