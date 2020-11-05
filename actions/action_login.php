<?php
  include_once('../includes/session.php');
  //include_once('../database/db_user.php'); TODO Database not done yet

  $username = $_POST['username'];
  $password = $_POST['password'];

  /*
  if (checkUserPassword($username, $password)) {
    $_SESSION['username'] = $username;
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Logged in successfully!');
  } else $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Login failed!');
  
    header('Location: ' . $_SERVER['HTTP_REFERER']);
*/
// TODO para que é as messages?
?>
