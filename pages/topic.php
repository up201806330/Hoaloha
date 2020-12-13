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
  if($isLoggedIn){ draw_adopt_div($thisUser['name'], $animal[0]['name'], $topic['id']); }
  draw_animal_full($animal, $topic, $thisUser, $isLoggedIn);

  start_adopt_favourite_container();


  if ($isLoggedIn) {
    if ($thisUser['username'] != $owner['username'] && !isAnimalAdopted($topic['idPet'])) {
      draw_adopt_button();
    }
  }
  else {
    if (!isAnimalAdopted($topic['idPet'])) echo '<div class="adopt-button-container">Log in to adopt this pet</div>';
  }

  end_adopt_favourite_container();

  draw_topic_details($topic, $owner, $approved_proposal, $animal[0]['name']);
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
      echo '<div class="add-answer-container">Log in to answer a question</div>';
    }
  }
  draw_end_questions_container();
  
  if($isLoggedIn){
    draw_add_question($topic['id'],$thisUser['id']);
  }
  else{
    echo '<div classs="add-question-container">Log in to ask a question</div>';
  }

  draw_footer();
  ?>