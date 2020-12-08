<?php
  include_once('../includes/database.php');

  function getUsersFavourites($idUser){
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM UserFavourites WHERE UserFavourites.idUser = ?');
    $stmt->execute(array($idUser));
    return $stmt->fetchAll();
  }

  function getTopicsFavouritedUsers($idTopic){
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT UserEntities.* FROM UserFavourites, UserEntities WHERE UserFavourites.idTopic = ? AND UserFavourites.idUser = UserEntities.id');
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