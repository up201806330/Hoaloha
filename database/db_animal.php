<?php
  include_once('../includes/database.php');

  function getAnimal($id) {
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM Pets INNER JOIN PetPhotos ON Pets.id = PetPhotos.idPet WHERE id = ?');
    $stmt->execute(array($id));
    return $stmt->fetch();
  }

  function getAllAnimals() {
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM Pets INNER JOIN PetPhotos ON Pets.id = PetPhotos.idPet');
    $stmt->execute();
    return $stmt->fetchAll();
  }

  function insertAnimal($name, $species, $weight, $color, $dimension, $gender, $age, $photo) {
    $db = Database::instance()->db();

    $stmt = $db->prepare('INSERT INTO Pets(name, species, weight, color, dimension, gender, age, photo) VALUES(?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute(array($name, $species, $weight, $color, $dimension, $gender, $age, $photo));
    return $db->lastInsertId();
  }
?>