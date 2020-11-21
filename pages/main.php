<?php 
  include_once('../database/db_image.php');
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_navbar.php'); 
  include_once('../templates/tpl_mainpage.php'); 

  draw_header();
  draw_navbar();
  draw_mainpage_body();
  draw_footer();

?>