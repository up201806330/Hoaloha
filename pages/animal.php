<?php 
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_animal.php');
  include_once("../database/db_animal.php");
  
  $animal = getAnimal($_GET['id']);
  
  draw_header();
  if ($animal != null) draw_animal_full($animal);
  draw_footer();
  ?>