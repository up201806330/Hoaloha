<?php 
  include_once('../templates/tpl_common.php');
  include_once("../database/db_animal.php");
  
  $animals = getAllAnimals();

  foreach($animals as $animal){
    draw_animal_simple($animal, getSpecies($animal['idSpecies']));
  }

  //TODO filtragem com parametros em $_GET

  draw_header();
  echo '<ul>';
  if ($animal != null && $species != null) draw_animal_simple($animal, $species);
  else header('Location: ../index.php');
  echo '</ul>';
  draw_footer();
  ?>