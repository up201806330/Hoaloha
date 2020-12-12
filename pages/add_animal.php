<?php 
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_animal.php');
  include_once("../database/db_animal.php");

  if (!isset($_SESSION['username'])){
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Must be logged in to add an animal!');
    header('Location: ../pages/main.php');
    die();
  }

  draw_header(false);
  draw_add_animal();
  draw_footer();
  ?>