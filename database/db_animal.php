<?php
  include_once('../includes/database.php');

  function getAnimal($id) {
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM Pets INNER JOIN PetPhotos ON Pets.id = PetPhotos.idPet WHERE id = ?');
    $stmt->execute(array($id));
    return $stmt->fetchAll();
  }

  function getAllAnimals() {
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM Pets INNER JOIN PetPhotos ON Pets.id = PetPhotos.idPet  GROUP BY id HAVING MIN(idPhoto)');
    $stmt->execute();
    return $stmt->fetchAll();
  }

  function insertAnimal($name, $species, $breed, $weight, $color, $dimension, $gender, $age, $files) {
    $db = Database::instance()->db();


    $stmt = $db->prepare('INSERT INTO Pets(name, species, breed, weight, color, dimension, gender, age) VALUES(?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute(array($name, $species, $breed, $weight, $color, $dimension, $gender, $age));

    $animalId = $db->lastInsertId();

    for ($i=0; $i < count($files['name']) ; $i++) { 
      $photoId = Database::instance()->insertDoc($files['type'][$i],$files['tmp_name'][$i]);

      $stmt = $db->prepare('INSERT INTO PetPhotos(idPet,idPhoto) VALUES(?, ?)');
      $stmt->execute(array($animalId,$photoId));
    }

    return $animalId;
  }

  function insertPhotos($idAnimal, $files) {
    $db = Database::instance()->db();

    for ($i=0; $i < count($files['name']) ; $i++) { 
      $photoId = Database::instance()->insertDoc($files['type'][$i],$files['tmp_name'][$i]);

      $stmt = $db->prepare('INSERT INTO PetPhotos(idPet,idPhoto) VALUES(?, ?)');
      $stmt->execute(array($idAnimal,$photoId));
    }
  }

  function updateAnimal($idAnimal, $name, $species, $breed, $weight, $color, $dimension, $gender, $age){

    $db = Database::instance()->db();

    $stmt = $db->prepare('UPDATE Pets SET name = ?, species = ?, breed = ?, weight = ?, color = ?, dimension = ?, gender = ?, age = ? WHERE id = ?');
    $stmt->execute(array($name, $species, $breed, $weight, $color, $dimension, $gender, $age, $idAnimal));

  }

  function deleteAnimal($idAnimal){

    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT idPhoto FROM PetPhotos WHERE idPet = ?');
    $stmt->execute(array($idAnimal));
    $photosIds = $stmt->fetchAll();

    foreach($photosIds as &$photoId){
      $stmt = $db->prepare('DELETE FROM Photos WHERE id = ?');
      $stmt->execute(array($photoId['idPhoto']));
    }

    $stmt = $db->prepare('DELETE FROM Pets WHERE id = ?');
    $stmt->execute(array($idAnimal));

  }

?>