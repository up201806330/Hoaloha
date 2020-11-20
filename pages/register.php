<?php 
  include_once('../templates/tpl_common.php');

  if (isset($_SESSION['username'])) die(header('Location: ../pages/main.php'));

  draw_header(false);
  draw_register();
  draw_footer();
  ?>