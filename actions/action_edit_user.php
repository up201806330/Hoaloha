<?php
  include_once('../includes/session.php');
  include_once('../database/db_user.php');

  $username = $_POST['username'];
  $name = $_POST['name'];
  $newPassword = $_POST['newPassword'];
  $confirmNewPassword = $_POST['confirmNewPassword'];
  $profile_img = $_FILES['profileImg'];
  $phone_number = $_POST['phoneNumber'];
  $email = $_POST['email'];
  $location = $_POST['location'];
  $idUser = $_POST['idUser'];

  $oldUsername = getUsernameById($idUser);

  //echo $name;

  //var_dump($profile_img);
  //if($profile_img['name'] == null)
    //echo "Ola";

  // Don't allow certain characters
  if ( !preg_match ("/^[a-zA-Z0-9]+$/", $username)) {
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username can only contain letters and numbers!');
    die(header('Location: ../pages/edit_profile.php?username=' . $oldUsername));
  }

  if($profile_img['tmp_name'] != null && exif_imagetype($profile_img['tmp_name']) != IMAGETYPE_PNG && exif_imagetype($profile_img['tmp_name']) != IMAGETYPE_JPEG){
    $_SESSION['message'][] = array('type' => 'error','content' => 'Profile image must be a png or a jpg!');
    die(header('Location: ../pages/edit_profile.php?username=' . $oldUsername));
  }

  if($newPassword != $confirmNewPassword){
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Passwords are different');
    die(header('Location: ../pages/edit_profile.php?username=' . $oldUsername));
  }

  try {
    updateUser($idUser, $username, $name, $newPassword, $phone_number, $email, $location, $profile_img);
    $_SESSION['username'] = $username;
    $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Updated user informations!');
    header('Location: ../pages/profile.php?username=' . $username);
  } catch (PDOException $e) { 
    $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to update user informations!');
    header('Location: ../pages/profile.php?username=' . $username);
  }
?>