<?php
    include_once('../includes/session.php');
    include_once('../database/db_animal.php');
    include_once('../database/db_topic.php');

    $files = $_FILES['images'];
    $idTopic = $_POST['idTopic'];
    $idAnimal = $_POST['idAnimal'];

    for ($i=0; $i < count($files['name']) ; $i++){
        if($files['tmp_name'][$i] != null && exif_imagetype($files['tmp_name'][$i]) != IMAGETYPE_PNG && exif_imagetype($files['tmp_name'][$i]) != IMAGETYPE_JPEG){
          $_SESSION['message'][] = array('type' => 'error','content' => 'Images must be png or jpeg!');
          die(header('Location: ../pages/topic.php?id=' . $idTopic));
        }
    }

    try{
        insertPhotos($idAnimal, $files);
        $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Added new photos!');
    } catch (PDOException $e) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Failed to add animal photos to db!');
    }

    header('Location: ../pages/topic.php?id=' . $idTopic);
?>