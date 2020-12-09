<?php
  include_once('../includes/database.php');

  function getQuestion($id) {
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM Questions WHERE id = ?');
    $stmt->execute(array($id));
    return $stmt->fetch();
  }

  function getAllQuestions() {
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM Questions');
    $stmt->execute();
    return $stmt->fetchAll();
  }

  function insertQuestion($idUser, $idTopic, $question, $data) {
    $db = Database::instance()->db();

    $stmt = $db->prepare('INSERT INTO Questions(idUserEntity, idTopic, question, data) VALUES(?, ?, ?, ?)');
    $stmt->execute(array($idUser, $idTopic, $question, $data));
    return $db->lastInsertId();
  }

  function getQuestionsPostedByUser($idUser){
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT DISTINCT * FROM Questions WHERE Questions.idUserEntity = ?');
    $stmt->execute(array($idUser));
    return $stmt->fetchAll();
  }

  function getAllQuestionsFromTopic($idTopic){
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT U.name, U.username, Q.question,Q.data, UP.idPhoto FROM Questions Q INNER JOIN UserEntities U ON Q.idUserEntity = U.id INNER JOIN UserPhotos UP ON UP.idUser = U.id WHERE Q.idTopic = ?');
    $stmt->execute(array($idTopic));
    return $stmt->fetchAll();
  }
  
  /*function topicWasPostedByUser($idTopic, $idUser){
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
  }*/

?>