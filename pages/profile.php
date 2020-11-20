<?php 
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_profile.php');
  include_once("../database/db_user.php");
  
  $profile = getUser($_GET['username']);
  
  draw_header();
  draw_profile($profile);
  draw_footer();
  ?>