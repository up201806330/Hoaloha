<?php 
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_profile.php');
  include_once('../templates/tpl_topic.php');
  include_once("../database/db_user.php");
  include_once("../database/db_animal.php");
  include_once("../database/db_topic.php");
  include_once("../database/db_favourites.php");
  include_once("../database/db_proposal.php");
  
  if (!isset($_GET['username'])){
    header('Location: ../pages/main.php');
    die();
  }

  $username = $_GET['username'];

  $profile = getUser($username);
  $topicsPosted = getTopicsPostedByUser($profile['id']);
  $topicsAdopted = getTopicsAdoptedByUser($profile['id']);
  $usersFavourites = getUsersFavourites($profile['id']);

  draw_header();
  draw_profile($profile);

  start_profile_animals_up_for_adoption_div($username, (@$_SESSION['username'] == $username), count($topicsPosted));
  foreach($topicsPosted as &$thisPosted) {
    if ($thisPosted != null) {
      $animal = getAnimal($thisPosted['idPet']);
      $isAdopted = isAnimalAdopted($thisPosted['idPet']);
      if ($animal != null && !$isAdopted) draw_topic_in_profile($thisPosted['id'], $animal);
    }
  }
  end_profile_animals_up_for_adoption_div();

  start_profile_animals_adopted_div($username, (@$_SESSION['username'] == $username), count($topicsAdopted));
  foreach($topicsAdopted as &$thisAdopted) {
    if ($thisAdopted != null) {
      $animal = getAnimal($thisAdopted['idPet']);
      if ($animal != null) draw_topic_in_profile($thisAdopted['id'], $animal);
    }
  }
  end_profile_animals_adopted_div();

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