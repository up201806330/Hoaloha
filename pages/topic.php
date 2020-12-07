<?php 
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_topic.php');
  include_once('../templates/tpl_animal.php');
  include_once('../templates/tpl_profile.php');
  include_once("../database/db_topic.php");
  include_once("../database/db_animal.php");
  include_once("../database/db_user.php");
  
  $topic = getTopic($_GET['id']);
  $animal = getAnimal($topic['idPet']);
  $user = getUser($topic['username']);
  
  draw_header();
  if ($animal != null)  draw_animal_full($animal); 
  if ($topic != null)   draw_topic($topic);
  if ($user != null)    draw_profile_simple($user);
  draw_footer();
  ?>