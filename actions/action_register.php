<?php
  include_once('../includes/session.php');
  include_once('../database/user.php');

  $username = $_POST['username'];
  $password = $_POST['password'];
  $profile_img = $_POST['profile_img'];
  $phone_number = $_POST['phone_number'];
  $email = $_POST['email'];
  $location = $_POST['location'];

  // Don't allow certain characters
  if ( !preg_match ("/^[a-zA-Z0-9]+$/", $username)) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username can only contain letters and numbers!');
    die(header('Location: ../pages/register.php'));
  }

  try {
    insertUser($username, $password, $profile_img, $phone_number, $email, $location); // TODO handle bad image and bad location here
    $_SESSION['username'] = $username;
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Signed up and logged in!');
    header('Location: ../pages/main.php');
  } catch (PDOException $e) { 
    die($e->getMessage());//TODO won't just die,
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to register!');
    header('Location: ../pages/register.php');
  }
?>