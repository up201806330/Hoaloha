<?php 
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
  
  $topic = getTopic($_GET['id']);
  if ($topic != null) {
    $animal = getAnimal($topic['idPet']);
    $owner = getUser($topic['username']);
    $questions = getAllQuestionsFromTopic($topic['id']);
  }
  
  if ($topic == null || $animal == null || $owner == null){
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to load topic');
    $_SESSION['topic'] = 'failure';
    //die();
    //header('Location: ../pages/main.php');
    die();
  }

  $idUser = getUser($_SESSION['username'])['id'];

  draw_header();
  draw_animal_full($animal);
  draw_topic_details($topic, $owner);
  draw_start_questions_container();
  foreach($questions as &$question){
    draw_question($question);
    draw_start_answers_container($question['id']);
    $answers = getAllAnswersFromQuestion($question['id']);
    foreach($answers as &$answer){
      draw_answer($answer);
    }
    draw_end_answers_container();
    draw_add_answer($question['id'],$idUser);
  }
  draw_end_questions_container();
  
 
  draw_add_question($topic['id'],$idUser);
  

  
  if (isset($_SESSION['username'])) {
    if ($_SESSION['username'] == $owner['username']) echo 'You cant adopt your own pet';
    else {
      $current_user = getUser($_SESSION['username']);
      draw_adopt_button();
      draw_adopt_div($current_user['name'], $animal['name'], $topic['id']);
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