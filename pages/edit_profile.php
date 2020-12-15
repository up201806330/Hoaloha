<?php 
  include_once('../templates/tpl_common.php');
  include_once('../templates/tpl_edit_profile.php');
  include_once("../database/db_user.php");
  
  $username = $_GET['username'];

  if (!isset($_GET['username']) || $username != $_SESSION['username']){
    header('Location: ../pages/main.php');
    die();
  }


  $profile = getUser($username);

  draw_header();
  draw_edit_profile($profile);
  draw_footer();
  ?>