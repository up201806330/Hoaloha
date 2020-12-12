<?php 
  include_once('../includes/session.php');
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_topic.php');
  include_once('../templates/tpl_animal.php');
  include_once('../templates/tpl_profile.php');
  include_once('../templates/tpl_favourites.php');
  include_once('../templates/tpl_adopt.php');
  include_once('../templates/tpl_question.php');
  include_once('../templates/tpl_answer.php');
  include_once("../database/db_topic.php");
  include_once("../database/db_animal.php");
  include_once("../database/db_user.php");
  include_once("../database/db_favourites.php");
  include_once("../database/db_question.php");
  include_once("../database/db_answer.php");
  include_once("../database/db_proposal.php");

  $isLoggedIn = isset($_SESSION['username']);
  $thisUser = null;

  if($isLoggedIn){
    $thisUser = getUser($_SESSION['username']); 
  }

  
  $topic = getTopic($_GET['id']);
  if ($topic != null) {
    $animal = getAnimal($topic['idPet']);
    $owner = getUser($topic['username']);
    $questions = getAllQuestionsFromTopic($topic['id']);
  }
  
  if ($topic == null || $animal == null || $owner == null){
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to load topic');
    header('Location: ../pages/main.php');
    die();
  }

  $approved_proposal = getApprovedProposal($topic['id']);

  draw_header();
  draw_animal_full($animal);
  draw_topic_details($topic, $owner, $approved_proposal);
  draw_start_questions_container();
  foreach($questions as &$question){
    draw_question($question);
    draw_start_answers_container($question['id']);
    $answers = getAllAnswersFromQuestion($question['id']);
    foreach($answers as &$answer){
      draw_answer($answer);
    }
    draw_end_answers_container();
    if($isLoggedIn){
      draw_add_answer($question['id'],$thisUser['id']);
    }
    else{
      echo 'Log in to answer a question';
    }
  }
  draw_end_questions_container();
  
  if($isLoggedIn){
    draw_add_question($topic['id'],$thisUser['id']);
  }
  else{
    echo 'Log in to ask a question';
  }
  
  if ($isLoggedIn) {
    if ($thisUser['username'] != $owner['username'] && !isAnimalAdopted($topic['idPet'])) {
      draw_adopt_button();
      draw_adopt_div($thisUser['name'], $animal['name'], $topic['id']);
    }
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