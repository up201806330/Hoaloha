<?php
  include_once('../includes/database.php');

  //use App\SQLiteBLOB as SQLiteBlob;

  function checkUserPassword($username, $password) {
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM UserEntities WHERE username = ?');
    $stmt->execute(array($username));

    $user = $stmt->fetch();
    return $user !== false && password_verify($password, $user['password']);
  }

  function insertUser($username, $name, $password, $profile_img, $phone_number, $email, $location) { // TODO missing some parameters
    $db = Database::instance()->db();

    $photoId = Database::instance()->insertDoc($profile_img['type'],$profile_img['tmp_name']);
    
    $options = ['cost' => 12];

    $stmt = $db->prepare('INSERT INTO UserEntities(username, name, password, location, phoneNumber, email) VALUES(?, ?, ?, ?, ?, ?)');
    $stmt->execute(array($username, $name, password_hash($password, PASSWORD_DEFAULT, $options),$location, $phone_number, $email));

    $userId = $db->lastInsertId();

    $stmt = $db->prepare('INSERT INTO UserPhotos(idUser,idPhoto) VALUES(?, ?)');
    $stmt->execute(array($userId,$photoId));
  }

  function updateUser($id, $username, $name, $password, $phone_number, $email, $location, $profile_img){
    $db = Database::instance()->db();
    $options = ['cost' => 12];

    if($password == null){
      $stmt = $db->prepare('UPDATE UserEntities SET username = ?, name = ?, phoneNumber = ?, email = ?, location = ? WHERE id = ?');
      $stmt->execute(array($username,$name,$phone_number,$email,$location,$id));
    }
    else{
      $stmt = $db->prepare('UPDATE UserEntities SET username = ?, name = ?, password = ?, phoneNumber = ?, email = ?, location = ? WHERE id = ?');
      $stmt->execute(array($username,$name,password_hash($password, PASSWORD_DEFAULT, $options),$phone_number,$email,$location,$id));
    }

    if($profile_img['name'] != null){
      $stmt = $db->prepare('SELECT idPhoto FROM UserPhotos WHERE idUser = ?');
      $stmt->execute(array($id));
      $idPhoto = $stmt->fetch();

      $stmt = $db->prepare('DELETE FROM UserPhotos WHERE idUser = ?');
      $stmt->execute(array($id));

      $stmt = $db->prepare('DELETE FROM Photos WHERE id = ?');
      $stmt->execute(array($idPhoto));

      $photoId = Database::instance()->insertDoc($profile_img['type'],$profile_img['tmp_name']);
      
      $stmt = $db->prepare('INSERT INTO UserPhotos(idUser,idPhoto) VALUES(?, ?)');
      $stmt->execute(array($id,$photoId));

    }
  }

  function getUsernameById($id){
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT username FROM UserEntities WHERE id = ?');
    $stmt->execute(array($id));
    return $stmt->fetch();
  }

  function getUser($username){
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM UserEntities INNER JOIN UserPhotos ON UserEntities.id = UserPhotos.idUser WHERE username = ?');
    $stmt->execute(array($username));
    return $stmt->fetch();
  }
?>