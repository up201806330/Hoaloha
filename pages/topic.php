<?php 
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_topic.php');
  include_once('../templates/tpl_animal.php');
  include_once("../database/db_topic.php");
  include_once("../database/db_animal.php");
  
  $topic = getTopic($_GET['id']);
  $animal = getAnimal($topic['idPet']);
  
  draw_header();
  if ($animal != null)  draw_animal_full($animal); 
  if ($topic != null)   draw_topic($topic);
  draw_footer();
  ?>