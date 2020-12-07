<?php
  include_once('../includes/database.php');

  function getTopic($id) {
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT Topics.id, idPet, username, description FROM Topics INNER JOIN UserEntities ON Topics.idUserEntity=UserEntities.id WHERE Topics.id = ?');
    $stmt->execute(array($id));
    return $stmt->fetch();
  }

  function getAllTopics() {
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM Topics');
    $stmt->execute();
    return $stmt->fetchAll();
  }

  function insertTopic($idUser, $idAnimal, $description) {
    $db = Database::instance()->db();

    $stmt = $db->prepare('INSERT INTO Topics(idUserEntity, idPet, description) VALUES(?, ?, ?)');
    $stmt->execute(array($idUser, $idAnimal, $description));
    return $db->lastInsertId();
  }

  function getTopicsPostedByUser($username){
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT DISTINCT Topics.* FROM Topics, UserEntities WHERE Topics.idUserEntity=UserEntities.id AND UserEntities.username=?');
    $stmt->execute(array($username));
    return $stmt->fetchAll();
  }
  
  function topicFromAnimalId($animalId){
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM Topics WHERE idPet = ?');
    $stmt->execute(array($animalId));
    return $stmt->fetch();
  }

?>