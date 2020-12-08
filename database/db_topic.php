<?php
  include_once('../includes/database.php');

  function getTopic($id) {
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT Topics.id, idPet, username, data, description FROM Topics INNER JOIN UserEntities ON Topics.idUserEntity=UserEntities.id WHERE Topics.id = ?');
    $stmt->execute(array($id));
    return $stmt->fetch();
  }

  function getAllTopics() {
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM Topics');
    $stmt->execute();
    return $stmt->fetchAll();
  }

  function insertTopic($idUser, $idAnimal, $description, $data) {
    $db = Database::instance()->db();

    $stmt = $db->prepare('INSERT INTO Topics(idUserEntity, idPet, description, data) VALUES(?, ?, ?, ?)');
    $stmt->execute(array($idUser, $idAnimal, $description,$data));
    return $db->lastInsertId();
  }

  function getTopicsPostedByUser($idUser){
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT DISTINCT * FROM Topics WHERE Topics.idUserEntity = ?');
    $stmt->execute(array($idUser));
    return $stmt->fetchAll();
  }
  
  function topicWasPostedByUser($idTopic, $idUser){
    $topics = getTopicsPostedByUser($idUser);
    foreach($topics as &$topic){
      if ($idTopic == $topic['id']) return true;
    }
    return false;
  }

  function topicFromAnimalId($animalId){
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM Topics WHERE idPet = ?');
    $stmt->execute(array($animalId));
    return $stmt->fetch();
  }

?>