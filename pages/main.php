<?php 
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_navbar.php'); 
  include_once('../templates/tpl_mainpage.php'); 
  include_once('../templates/tpl_search.php'); 

  draw_header();
  draw_navbar();
  draw_search();
  draw_mainpage_body();
  draw_footer();
?>