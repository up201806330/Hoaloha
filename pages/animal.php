<?php 
  include_once('../templates/tpl_common.php');
  include_once("../database/db_animal.php");
  
  $animal = getAnimal($_GET['id']);
  $species = getSpecies($animal['idSpecies']);

  draw_header();
  if ($animal != null && $species != null) draw_animal_full($animal, $species);
  else header('Location: ../index.php');
  draw_footer();
  ?>