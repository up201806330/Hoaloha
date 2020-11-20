<?php 
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_animal.php');
  include_once("../database/db_animal.php");
  
  $animals = getAllAnimals();

  //TODO filtragem com parametros em $_GET

  draw_header();
  echo '<ul>';
  foreach($animals as &$animal){
    if ($animal != null) draw_animal_simple($animal);
    //else header('Location: ../index.php');
  }
  echo '</ul>';
  draw_footer();
  ?>