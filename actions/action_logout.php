<?php
  include_once('../includes/session.php');
  unset($_SESSION['username']);
  $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Logged out!');
  header('Location: ../pages/main.php');
?>