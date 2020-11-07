<?php 
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_navbar.php');

  if (isset($_SESSION['username'])) header('Location: ' . $_SERVER['HTTP_REFERER']);

  draw_header();
  draw_navbar(false);
  draw_register();
  draw_footer();
  ?>