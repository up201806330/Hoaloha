<?php
  include_once('../includes/session.php');
  include_once('../database/user.php');

  $username = $_POST['username'];
  $password = $_POST['password'];

  if (checkUserPassword($username, $password)) {
    $_SESSION['username'] = $username;
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Logged in successfully!');
    $_SESSION['login'] = 'success';
    header('Location: ../pages/main.php');
  } else {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Login failed!');
    $_SESSION['login'] = 'failure';
    header('Location: ../pages/main.php');
  }
?>
