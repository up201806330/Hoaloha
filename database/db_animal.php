<?php
  include_once('../includes/database.php');

  function getSpecies($id){
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM Species WHERE id = ?');
    $stmt->execute(array($id));
    $stmt->fetch();
    return $stmt['name'];
  }

  function getAnimal($id) {
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM Pets WHERE id = ?');
    $stmt->execute(array($id));
    return $stmt->fetch();
  }

  function getAllAnimals() {
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM Pets');
    $stmt->execute();
    return $stmt->fetchAll();
  }
  
?>