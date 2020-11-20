<?php
  include_once('../includes/database.php');

  function checkUserPassword($username, $password) {
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM UserEntities WHERE username = ?');
    $stmt->execute(array($username));

    $user = $stmt->fetch();
    return $user !== false && password_verify($password, $user['password']);
  }

  function insertUser($username, $password, $profile_img, $phone_number, $email, $location) { // TODO missing some parameters
    $db = Database::instance()->db();

    $options = ['cost' => 12];

    $stmt = $db->prepare('INSERT INTO UserEntities(username, password, photo, idLocation, phoneNumber, email) VALUES(?, ?, ?, ?, ?, ?)');
    $stmt->execute(array($username, password_hash($password, PASSWORD_DEFAULT, $options), $profile_img, $phone_number, $email, $location));
  }
?>