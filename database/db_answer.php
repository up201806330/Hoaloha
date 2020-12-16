<?php
  include_once('../includes/database.php');

  function getAnswer($id) {
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM Answers WHERE id = ?');
    $stmt->execute(array($id));
    return $stmt->fetch();
  }

  function getAllAnswers() {
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM Answers');
    $stmt->execute();
    return $stmt->fetchAll();
  }

  function insertAnswer($idUser, $idQuestion, $answer, $data) {
    $db = Database::instance()->db();

    $stmt = $db->prepare('INSERT INTO Answers(idUserEntity, idQuestion, answer, data) VALUES(?, ?, ?, ?)');
    $stmt->execute(array($idUser, $idQuestion, $answer, $data));
    return $db->lastInsertId();
  }

  function getAnswersPostedByUser($idUser){
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT DISTINCT * FROM Answers WHERE Answers.idUserEntity = ?');
    $stmt->execute(array($idUser));
    return $stmt->fetchAll();
  }

  function getAllAnswersFromQuestion($idQuestion){
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT U.name, U.username, A.answer, A.id, A.data, UP.idPhoto FROM Answers A INNER JOIN UserEntities U ON A.idUserEntity = U.id INNER JOIN UserPhotos UP ON UP.idUser = U.id WHERE A.idQuestion = ?');
    $stmt->execute(array($idQuestion));
    return $stmt->fetchAll();
  }

  function getAnswerAndUser($idAnswer){
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT U.username, U.name, UP.idPhoto,A.answer, A.data, A.idQuestion from Answers A Inner JOIN UserEntities U ON A.idUserEntity = U.id INNER JOIN UserPhotos UP ON UP.idUser = U.id WHERE A.id = ?');
    $stmt->execute(array($idAnswer));
    return $stmt->fetchAll();
  }

  function deleteAnswer($idAnswer){
    $db = Database::instance()->db();

    $stmt = $db->prepare('DELETE FROM Answers WHERE id = ?');
    $stmt->execute(array($idAnswer));
  }
  

?>