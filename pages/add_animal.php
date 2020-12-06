<?php 
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_animal.php');
  include_once("../database/db_animal.php");

  if (!isset($_SESSION['username'])){
    $_SESSION['add_animal_page'] = 'failure';
    header('Location: ../pages/main.php');
    die();
  }

  draw_header(false);
  draw_add_animal();
  draw_footer();
  ?>