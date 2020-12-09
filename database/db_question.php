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

  function getQuestionAndUser($idQuestion){
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT U.username, U.name, UP.idPhoto,Q.question, Q.data from Questions Q Inner JOIN UserEntities U ON Q.idUSerEntity = U.id INNER JOIN UserPhotos UP ON UP.idUser = U.id WHERE Q.id = ?');
    $stmt->execute(array($idQuestion));
    return $stmt->fetchAll();
  }
  

?>