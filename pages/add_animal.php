<?php 
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_animal.php');
  include_once("../database/db_animal.php");

  draw_header(false);
  draw_add_animal();
  draw_footer();
  ?>