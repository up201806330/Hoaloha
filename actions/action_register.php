<?php
  include_once('../includes/token.php');
  include_once('../includes/session.php');
  include_once('../database/db_user.php');

  validate_token($_POST['csrf']);

  $username = $_POST['username'];
  $name = $_POST['name'];
  $password = $_POST['password'];
  //$profile_img = $_FILES['profile_img'];
  $phone_number = $_POST['phone_number'];
  $email = $_POST['email'];
  $location = $_POST['location'];

  // Don't allow certain characters
  if ( !preg_match ("/^[a-zA-Z0-9]+$/", $username)) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username can only contain letters and numbers!');
    die(header('Location: ../pages/register.php'));
  }

  /*if(exif_imagetype($profile_img['tmp_name']) != IMAGETYPE_PNG && exif_imagetype($profile_img['tmp_name']) != IMAGETYPE_JPEG){
    $_SESSION['message'][] = array('type' => 'error','content' => 'Profile image must be a png or a jpg!');
    die(header('Location: ../pages/register.php'));
  }*/

  try {
    insertUser($username, $name, $password, $phone_number, $email, $location);
    $_SESSION['username'] = $username;
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Signed up and logged in!');
    header('Location: ../pages/main.php');
  } catch (PDOException $e) { 
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to register!');
    header('Location: ../pages/register.php');
  }
?>