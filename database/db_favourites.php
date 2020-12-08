<?php
  include_once('../includes/database.php');

  function getUsersFavourites($username){
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT UserFavourites.* FROM UserFavourites, UserEntities WHERE UserEntities.username = ? AND UserEntities.id = UserFavourites.idUser');
    $stmt->execute(array($username));
    return $stmt->fetchAll();
  }

  function getTopicsFavourites($idTopic){
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM UserFavourites WHERE idTopic = ?');
    $stmt->execute(array($idTopic));
    return $stmt->fetchAll();
  }

  function getFavourite($idUser, $idTopic){
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM UserFavourites WHERE idUser = ? AND idTopic = ?');
    $stmt->execute(array($idUser, $idTopic));
    return $stmt->fetch();
  }

  function addFavourite($idUser, $idTopic){
    $db = Database::instance()->db();

    $stmt = $db->prepare('INSERT INTO UserFavourites(idUser, idTopic) VALUES(?, ?)');
    $stmt->execute(array($idUser, $idTopic));
  }

  function removeFavourite($idUser, $idTopic){
    $db = Database::instance()->db();

    $stmt = $db->prepare('DELETE FROM UserFavourites WHERE idUser = ? AND idTopic = ?');
    $stmt->execute(array($idUser, $idTopic));
  }

?>