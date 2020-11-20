<?php 
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_navbar.php');

  if (isset($_SESSION['username'])) die(header('Location: ../pages/main.php'));

  draw_header(false);
  draw_navbar();
  draw_register();
  draw_footer();
  ?>